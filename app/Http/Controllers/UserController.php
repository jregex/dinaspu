<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Intervention\Image\Laravel\Facades\Image;
use SweetAlert2\Laravel\Swal;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'List Users',
            'users' => User::with('role')->get(),
            'roles' => Role::get(),
        ];

        return view('admin.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah User',
            'roles' => Role::get(),
        ];

        return view('admin.users.create', $data);
    }

    public function updatepassword(Request $request)
    {
        $request->validate(
            [
                'current_password' => ['required', 'min:6'],
                'new_password' => ['required', Rules\Password::defaults()],
                'password_confirmation' => ['required', 'same:new_password'],
            ],
            [
                'current_password.required' => 'current password tidak boleh kosong',
                'current_password.min' => 'current password harus lebih dari 6 karakter',
                'new_password.required' => 'new password tidak boleh kosong',
                'password_confirmation.same' => 'tidak sama dengan password baru',
                'password_confirmation.required' => 'password konfirmasi tidak boleh kosong',
            ]
        );
        if (! Hash::check($request->current_password, $request->user()->password)) {
            return back()->with('failed', 'Password salah');
        }
        $user = User::whereId($request->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);
        if ($user) {
            Swal::success([
                'title' => 'password berhasil dirubah',
            ]);
        } else {
            Swal::error([
                'title' => 'password gagal dirubah',
            ]);
        }

        return to_route('myprofile');
    }

    public function change_password()
    {
        $data = [
            'title' => 'Ganti Password',
        ];

        return view('admin.users.change-password', $data);
    }

    public function index2()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $data = [
            'users' => $user,
            'title' => 'Edit User',
            'roles' => Role::get(),
        ];

        return view('admin.users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'profile' => ['mimes:png,jpg,jpeg,gif,webp'],
        ], [
            'profile.mimes' => 'tidak mendukung format gambar tersebut',
        ]);
        $file = $request->file('profile');
        if (! $file) {
            $filename = $user->image;
        } else {
            if (! Storage::exists('/public/profile')) {
                Storage::makeDirectory('public/profile', 0775, true);
            }
            $file = $request->file('profile');
            $filename = date('d-m-s', strtotime(now())).'.'.$file->getClientOriginalExtension();
            $img = Image::read($file);
            $img->scale(height: 300);
            $img->save(Storage::path('public/profile/'.$filename));
            if ($user->profile != 'default.webp') {
                Storage::delete('public/profile/'.$user->image);
            }
        }
        $update = User::where('id', $user->id)->update([
            'nama' => $request->nama,
            'role_id' => $request->role_id,
            'email' => $request->email,
            'image' => $filename,
        ]);
        if ($update) {
            $sesi = $request->user();
            if ($user->email == $sesi->email) {
                $sesi->update([
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'role_id' => $request->role_id,
                    'image' => $filename,
                ]);
                $request->session()->regenerate();
            }
            Swal::success([
                'title' => 'data berhasil diupdate',
            ]);
        } else {
            Swal::error([
                'title' => 'data gagal diupdate',
            ]);
        }

        return to_route('users.index');
    }

    public function myprofile()
    {
        $getrole = Role::where('id', Auth::user()->role_id)->select('role')->first();
        $data = [
            'title' => 'My Profile',
            'role' => $getrole->role,
        ];

        return view('admin.users.myprofile', $data);
    }

    public function update_profile(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'profile' => ['mimes:png,jpg,jpeg,gif,webp'],
        ], [
            'profile.mimes' => 'tidak mendukung format gambar tersebut',
        ]);
        $file = $request->file('profile');
        if (! $file) {
            $filename = Auth::user()->image;
        } else {
            if (! Storage::exists('/public/profile')) {
                Storage::makeDirectory('public/profile', 0775, true);
            }
            $file = $request->file('profile');
            $filename = date('d-m-s', strtotime(now())).'.'.$file->getClientOriginalExtension();
            $oldimage = Auth::user()->image;
            $img = Image::read($file);
            $img->scale(height: 300);
            $img->save(Storage::path('public/profile/'.$filename));
            if ($oldimage != 'default.webp') {
                Storage::delete('public/profile/'.$oldimage);
            }
        }
        $update = User::where('id', Auth::user()->id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'image' => $filename,
        ]);
        if ($update) {
            $sesi = $request->user();
            $sesi->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'image' => $filename,
            ]);
            $request->session()->regenerate();
            Swal::success([
                'title' => 'profil berhasil diupdate',
            ]);
        } else {
            Swal::error([
                'title' => 'profil gagal diupdate',
            ]);
        }

        return to_route('myprofile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->email == Auth::user()->email) {
            Swal::error([
                'title' => 'User ini sedang digunakan',
            ]);

            return to_route('users.index');
        } else {
            $delete = $user->delete();
            if ($delete) {
                if ($user->image != 'default.webp') {
                    Storage::delete('public/profile/'.$user->image);
                }
                Swal::success([
                    'title' => 'Data berhasil dihapus',
                ]);
            } else {
                Swal::error([
                    'title' => 'Data gagal dihapus',
                ]);
            }

            return to_route('users.index');
        }
    }
}
