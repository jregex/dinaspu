<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\Pegawai;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\ImageManager;
use SweetAlert2\Laravel\Swal;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'jml_post' => Post::count(),
            'jml_user' => Pegawai::count(),
            'pegawai_pendidikan' => Pegawai::selectRaw('pendidikan as pendidikan,count(*) as aggregate')->groupBy('pendidikan')->get(),
        ];
        // dd($data['pegawai_pendidikan']);

        return view('admin.dashboard', $data);
    }

    public function gallery_list(GalleryCategory $category)
    {
        $data = [
            'title' => 'List galeri',
            'images' => $category->galleries()->get(),
            'category' => $category->id,
            'category_name' => $category->category,
        ];

        // dd($data['images']);

        return view('admin.galleries.index', $data);
    }

    public function gallery_store(Request $request): JsonResponse
    {
        if (! Storage::exists('/public/galleries')) {
            Storage::makeDirectory('public/galleries', 0775, true);
        }

        // return response()->json(['data' => $request->category_id]);
        $images = [];
        $category_id = $request->category_id;
        if ($request->file('files')) {
            $manager = new ImageManager(new Driver);
            foreach ($request->file('files') as $image) {
                // $fileName = $category_id.'_'.uniqid().'.'.$image->getClientOriginalExtension();
                $img = $manager->read($image)
                    ->scale(height: 600);
                // $img->scale(height: 600);
                $img->toWebp(95);
                $fileName = $category_id.'_'.uniqid();
                $img->save(Storage::path('public/galleries/'.$fileName.'.webp'));
                // $image
                $images[] = [
                    'name' => $fileName.'.webp',
                    'location' => asset('storage/public/galleries/'.$fileName.'.webp'),
                    'gallery_category_id' => $category_id,
                    // 'filesize' => filesize(public_path('images/'.$fileName)),
                ];

            }
            foreach ($images as $imageData) {
                Gallery::create($imageData);
            }

            return response()->json(['success' => 'berhasil diupload']);
        } else {
            return response()->json(['error' => 'tidak ada gambar']);
        }

    }

    public function gallery_destroy(Gallery $gallery)
    {
        $id = $gallery->gallery_category_id;
        $delete = $gallery->delete();
        if ($delete) {
            if ($gallery->name != 'default.webp') {
                Storage::delete('public/galleries/'.$gallery->name);
            }
            Swal::success([
                'title' => 'Data berhasil dihapus',
            ]);
        } else {
            Swal::error([
                'title' => 'Data gagal dihapus',
            ]);
        }

        return to_route('galleries.index', ['category' => $id]);
    }

    public function gallery_delete($category)
    {
        $galleries = Gallery::where('gallery_category_id', $category);
        $gallery = $galleries->get();
        $delete = $galleries->delete();
        if ($delete) {
            foreach ($gallery as $item) {
                Storage::delete('public/galleries/'.$item->name);
            }
            Swal::success([
                'title' => 'Data berhasil dihapus',
            ]);
        } else {
            Swal::error([
                'title' => 'Data gagal dihapus',
            ]);
        }

        return to_route('galleries.index', ['category' => $category]);
    }

    public function gallery_categories_list()
    {
        $data = [
            'title' => 'Kategori Galeri',
            'categories' => GalleryCategory::get(),
        ];

        return view('admin.galleries.categories_list', $data);
    }

    public function gallery_categories_store(Request $request)
    {
        $validated = $request->validate([
            'category' => ['required', 'unique:gallery_categories,category'],
        ], [
            'category.required' => 'Kategori tidak boleh kosong',
            'category.unique' => 'Data sudah ada',
        ]);

        $save = GalleryCategory::create($validated);
        if ($save) {
            Swal::success([
                'title' => 'Data berhasil ditambahkan',
            ]);
        } else {
            Swal::error([
                'title' => 'Data gagal ditambahkan',
            ]);
        }

        return to_route('gallery-categories.index');

    }

    public function gallery_categories_edit(GalleryCategory $category)
    {
        return response()->json(['data' => $category]);
    }

    public function gallery_categories_update(Request $request, GalleryCategory $category)
    {
        $validated = $request->validate([
            'category' => ['required'],
        ]);
        $update = $category->update($validated);
        if ($update) {
            Swal::success([
                'title' => 'Data berhasil diupdate',
            ]);
        } else {
            Swal::error([
                'title' => 'Data gagal diupdate',
            ]);
        }

        return to_route('gallery-categories.index');
    }

    public function gallery_categories_destroy(GalleryCategory $category)
    {
        $galleries = Gallery::where('gallery_category_id', $category->id);
        $delete = $category->delete();
        if ($delete) {
            $gallery = $galleries->get();
            $galleries->delete();
            foreach ($gallery as $item) {
                Storage::delete('public/galleries/'.$item->name);
            }
            Swal::success([
                'title' => 'Data berasil dihapus',
            ]);
        } else {
            Swal::error([
                'title' => 'Data gagal dihapus',
            ]);
        }

        return to_route('gallery-categories.index');
    }
}
