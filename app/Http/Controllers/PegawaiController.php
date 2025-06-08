<?php

namespace App\Http\Controllers;

use App\Imports\JabatanImport;
use App\Imports\PegawaiImport;
use App\Models\Jabatan;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;
use SweetAlert2\Laravel\Swal;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'List Pegawai',
            'pegawais' => Pegawai::with('jabatan')->latest()->get(),
        ];

        return view('admin.pegawai.index', $data);
    }

    public function edit(Pegawai $pegawai)
    {
        $data = [
            'title' => 'Edit Pegawai',
            'pegawai' => $pegawai,
            'jabatans' => Jabatan::get(),
        ];

        return view('admin.pegawai.edit', $data);
    }

    public function store(Request $request)
    {
        // dd(date('Y',strtotime($request->thn_lulus)));
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'min:15', 'unique:pegawais,nip'],
            'jabatan_id' => ['required'],
            // 'golongan'=>['required'],
            // 'tmt1'=>['required','date'],
            // 'tmt2'=>['required','date'],
            // 'masa_kerja'=>['required','date'],
            'pendidikan' => ['required'],
            'thn_lulus' => ['required'],
            'tgl_lahir' => ['required', 'date'],
            'profile' => ['mimes:png,jpg,jpeg,gif,webp'],
        ]);
        if ($request->file('profile')) {
            if (! Storage::exists('/public/pegawai')) {
                Storage::makeDirectory('public/pegawai', 0775, true);
            }
            $file = $request->file('profile');
            $filename = date('d-m-s', strtotime(now())).'.'.$file->getClientOriginalExtension();
            $img = Image::read($file);
            $img->scale(height: 300);
            $img->save(Storage::path('public/pegawai/'.$filename));
        } else {
            $filename = 'default.webp';
        }

        $save = Pegawai::create([
            'nama' => $request->nama,
            'jabatan_id' => $request->jabatan_id,
            'nip' => $request->nip,
            'golongan' => $request->golongan,
            'tmt1' => date('Y-m-d', strtotime($request->tmt1)),
            'tmt2' => date('Y-m-d', strtotime($request->tmt2)),
            'masa_kerja' => date('Y-m-d', strtotime($request->masa_kerja)),
            'nama_pelatihan' => $request->nama_pelatihan,
            'lulus_pelatihan' => $request->lulus_pelatihan,
            'lama_kerja' => $request->lama_kerja,
            'pendidikan' => $request->pendidikan,
            'thn_lulus' => $request->thn_lulus,
            'tgl_lahir' => date('Y-m-d', strtotime($request->tgl_lahir)),
            'image' => $filename,
        ]);

        if ($save) {
            Swal::success([
                'title' => 'Data berhasil ditambahkan',
            ]);
        } else {
            Swal::error([
                'title' => 'Data gagal ditambahkan',
            ]);
        }

        return to_route('pegawai.index');
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'nip' => ['required'],
            'jabatan_id' => ['required'],
            // 'golongan'=>['required'],
            // 'tmt1'=>['required','date'],
            // 'tmt2'=>['required','date'],
            // 'masa_kerja'=>['required','date'],
            'pendidikan' => ['required'],
            'thn_lulus' => ['required'],
            'tgl_lahir' => ['required', 'date'],
            'profile' => ['mimes:png,jpg,jpeg,gif,webp'],
        ]);
        if ($request->file('profile')) {
            if (! Storage::exists('/public/pegawai')) {
                Storage::makeDirectory('public/pegawai', 0775, true);
            }

            $file = $request->file('profile');
            $filename = date('d-m-s', strtotime(now())).'.'.$file->getClientOriginalExtension();
            $img = Image::read($file);
            $img->scale(height: 300);
            $img->save(Storage::path('public/pegawai/'.$filename));
            if ($pegawai->image != 'default.webp') {
                Storage::delete('public/pegawai/'.$pegawai->image);
            }
        } else {
            $filename = 'default.webp';
        }
        $update = $pegawai->update([
            'nama' => $request->nama,
            'jabatan_id' => $request->jabatan_id,
            'nip' => $request->nip,
            'golongan' => $request->golongan,
            'tmt1' => date('Y-m-d', strtotime($request->tmt1)),
            'tmt2' => date('Y-m-d', strtotime($request->tmt2)),
            'masa_kerja' => date('Y-m-d', strtotime($request->masa_kerja)),
            'nama_pelatihan' => $request->nama_pelatihan,
            'lulus_pelatihan' => $request->lulus_pelatihan,
            'lama_kerja' => $request->lama_kerja,
            'pendidikan' => $request->pendidikan,
            'thn_lulus' => $request->thn_lulus,
            'tgl_lahir' => date('Y-m-d', strtotime($request->tgl_lahir)),
            'image' => $filename,
        ]);
        if ($update) {
            Swal::success([
                'title' => 'Data berhasil diupdate',
            ]);
        } else {
            Swal::error([
                'title' => 'Data gagal diupdate',
            ]);
        }

        return to_route('pegawai.index');
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Pegawai',
            'jabatans' => Jabatan::get(),
        ];

        return view('admin.pegawai.create', $data);
    }

    public function destroy(Pegawai $pegawai)
    {
        $delete = $pegawai->delete();
        if ($delete) {
            if ($pegawai->image != 'default.webp') {
                Storage::delete('public/pegawai/'.$pegawai->image);
            }
            Swal::success([
                'title' => 'Data berhasil dihapus',
            ]);
        } else {
            Swal::error([
                'title' => 'Data gagal dihapus',
            ]);
        }

        return to_route('pegawai.index');
    }

    public function list_jabatans()
    {
        $data = [
            'title' => 'List Jabatan',
            'jabatans' => Jabatan::get(),
        ];

        return view('admin.pegawai.jabatan', $data);
    }

    public function store_jabatan(Request $request)
    {
        $validated = $request->validate([
            'jabatan' => ['required', 'unique:jabatans,jabatan'],
        ], [
            'jabatan.required' => 'Jabatan tidak boleh kosong',
            'jabatan.unique' => 'Data sudah ada',
        ]);

        $save = Jabatan::create($validated);
        if ($save) {
            Swal::success([
                'title' => 'Data berhasil ditambahkan',
            ]);
        } else {
            Swal::error([
                'title' => 'Data gagal ditambahkan',
            ]);
        }

        return to_route('jabatans.index');
    }

    public function edit_jabatan(Jabatan $jabatan)
    {
        return response()->json(['data' => $jabatan]);
    }

    public function update_jabatan(Request $request, Jabatan $jabatan)
    {
        $validated = $request->validate([
            'jabatan' => ['required'],
        ]);
        $update = $jabatan->update($validated);
        if ($update) {
            Swal::success([
                'title' => 'Data berhasil diupdate',
            ]);
        } else {
            Swal::error([
                'title' => 'Data gagal diupdate',
            ]);
        }

        return to_route('jabatans.index');
    }

    public function destroy_jabatan(Jabatan $jabatan)
    {
        $delete = $jabatan->delete();
        if ($delete) {
            Swal::success([
                'title' => 'Data berasil dihapus',
            ]);
        } else {
            Swal::error([
                'title' => 'Data gagal dihapus',
            ]);
        }

        return to_route('jabatans.index');
    }

    public function export_jabatan()
    {
        $data = [
            'title' => 'Export file',
        ];

        return view('admin.pegawai.export-jabatan', $data);
    }

    public function post_export(Request $request)
    {
        Excel::import(new JabatanImport, $request->file('jabatan'), \Maatwebsite\Excel\Excel::CSV);

        return response()->json(['success' => 'file berhasil diexport.']);
    }

    public function export_pegawai()
    {
        $data = [
            'title' => 'Export file',
        ];

        return view('admin.pegawai.export-pegawai', $data);
    }

    public function post_export_pegawai(Request $request)
    {
        if ($request->file('pegawai')->getClientOriginalExtension() == 'xlsx') {
            $import = (new PegawaiImport)->import($request->file('pegawai'), 'local', \Maatwebsite\Excel\Excel::XLSX);
        } elseif ($request->file('pegawai')->getClientOriginalExtension() == 'csv') {
            $import = (new PegawaiImport)->import($request->file('pegawai'), 'local', \Maatwebsite\Excel\Excel::CSV);
        }
        if ($import) {
            return response()->json(['success' => 'file berhasil diexport.']);
        } else {
            return response()->json(['success' => 'file gagal diexport.']);
        }
    }
}
