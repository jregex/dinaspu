<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Intervention\Image\Laravel\Facades\Image;
use SweetAlert2\Laravel\Swal;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'role_id' => ['required'],
            'password' => ['required', Rules\Password::defaults()],
            'password_confirmation' => ['required','same:password'],
            'profile' => ['mimes:png,jpg,jpeg,gif,webp'],
        ]);
        if ($request->file('profile')) {
            if (! Storage::exists('/public/profile')) {
                Storage::makeDirectory('public/profile', 0775, true);
            }
            $file = $request->file('profile');
            $filename = date('d-m-s', strtotime(now())).'.'.$file->getClientOriginalExtension();
            $img = Image::read($file);
            $img->scale(height: 300);
            $img->save(Storage::path('public/profile/'.$filename));
        } else {
            $filename = 'default.webp';
        }
        $save = User::create([
            'nama' => $request->nama,
            'role_id' => $request->role_id,
            'email' => $request->email,
            'password' => Hash::make($request->string('password')),
            'image' => $filename,
        ]);
        if ($save) {
            Swal::success([
                'title'=>'Data berhasil ditambahkan'
            ]);
        } else {
            Swal::error([
                'title'=>'Data gagal ditambahkan'
            ]);
        }
        return to_route('users.index');
    }
}
