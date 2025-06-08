<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\ImageManager;
use SweetAlert2\Laravel\Swal;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'List Berita',
            'posts' => Post::with('category')->get(),
        ];

        return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Berita',
            'categories' => Category::get(),
        ];

        return view('admin.posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'category_id' => ['required'],
            'penulis' => ['required'],
            'profile' => ['mimes:png,jpg,jpeg,webp'],
        ]);
        if ($request->file('profile')) {
            $manager = new ImageManager(new Driver);
            if (! Storage::exists('/public/berita')) {
                Storage::makeDirectory('public/berita', 0775, true);
            }
            $file = $request->file('profile');
            $title = strtolower($request->title);
            $filename = date('s', strtotime(now())).'-'.str_replace(' ', '-', $title);
            $img = $manager->read($file)
                ->scale(400);
            $img->toWebp(85);
            $filename = $filename.'.webp';
            $img->save(Storage::path('public/berita/'.$filename));
        } else {
            $filename = 'default.webp';
        }
        $save = Post::create([
            'title' => request('title'),
            'category_id' => request('category_id'),
            'penulis' => request('penulis'),
            'published' => false,
            'body' => request('editor'),
            'image' => $filename,
        ]);
        if ($save) {
            Swal::success([
                'title' => 'Data berhasil disimpan',
            ]);
        } else {
            Swal::error([
                'title' => 'Data gagal disimpan',
            ]);
        }

        return to_route('posts.index');
    }

    public function upload(Request $request): JsonResponse
    {
        if ($request->hasFile('upload')) {
            if (! Storage::exists('/public/media')) {
                Storage::makeDirectory('public/media', 0775, true);
            }
            $manager = new ImageManager(new Driver);
            $file = $request->file('upload');
            $originName = $file->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            // $extension = $file->getClientOriginalExtension();
            $fileName = $fileName.'_'.time();
            $img = $manager->read($file)
                ->scale(500);
            // $request->file('upload')->move(public_path('media'), $fileName);
            $img->toWebp(85);
            // if (! Storage::exists('/public/media/'.$fileName)) {
            //     Storage::makeDirectory('public/media', 0775, true);
            // }
            $fileName = $fileName.'.webp';
            $img->save(Storage::path('public/media/'.$fileName));
            $url = asset('storage/public/media/'.$fileName);

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        } else {
            return response()->json(['uploaded' => 0, 'error' => ['message' => 'gagal upload ukuran file mungkin terlalu besar']]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $data = [
            'title' => 'Preview berita',
            'post' => $post,
        ];

        return view('admin.posts.details', $data);
    }

    public function publish(Post $post)
    {
        $post->update(['published' => 1]);
        Swal::success([
            'title' => 'Berhasil dipublikasi',
        ]);

        return to_route('posts.show', ['post' => $post->id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $data = [
            'title' => 'Edit Berita',
            'post' => $post,
            'categories' => Category::get(),
        ];

        return view('admin.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => ['required'],
            'category_id' => ['required'],
            'penulis' => ['required'],
            'profile' => ['mimes:png,jpg,jpeg,webp'],
        ]);
        $oldimage = $post->image;
        if ($request->file('profile')) {
            $manager = new ImageManager(new Driver);
            if (! Storage::exists('/public/berita')) {
                Storage::makeDirectory('public/berita', 0775, true);
            }
            $file = $request->file('profile');
            $filename = date('s', strtotime(now())).'-'.$post->slug;
            $img = $manager->read($file)
                ->scale(400);
            $img->toWebp(85);
            $filename = $filename.'.webp';
            $img->save(Storage::path('public/berita/'.$filename));
            if ($oldimage != 'default.webp') {
                Storage::delete('public/berita/'.$oldimage);
            }
        } else {
            $filename = $oldimage;
        }
        $update = $post->update([
            'title' => request('title'),
            'category_id' => request('category_id'),
            'penulis' => request('penulis'),
            'published' => true,
            'body' => request('editor'),
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

        return to_route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $delete = $post->delete();
        if ($delete) {
            if ($post->image != 'default.webp') {
                Storage::delete('public/berita/'.$post->image);
            }
            Swal::success([
                'title' => 'Data berhasil dihapus',
            ]);
        } else {
            Swal::error([
                'title' => 'Data gagal dihapus',
            ]);
        }

        return to_route('posts.index');
    }

    public function list_categories()
    {
        $data = [
            'title' => 'List Kategori',
            'categories' => Category::get(),
        ];

        return view('admin.posts.categories', $data);
    }

    public function store_category(Request $request)
    {
        $validated = $request->validate([
            'category' => ['required', 'unique:categories,category'],
        ], [
            'category.required' => 'Kategori tidak boleh kosong',
            'category.unique' => 'Data sudah ada',
        ]);

        $save = Category::create($validated);
        if ($save) {
            Swal::success([
                'title' => 'Data berhasil ditambahkan',
            ]);
        } else {
            Swal::error([
                'title' => 'Data gagal ditambahkan',
            ]);
        }

        return to_route('categories.index');

    }

    public function edit_category(Category $category)
    {
        return response()->json(['data' => $category]);
    }

    public function update_category(Request $request, Category $category)
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

        return to_route('categories.index');
    }

    public function destroy_category(Category $category)
    {
        $delete = $category->delete();
        if ($delete) {
            Swal::success([
                'title' => 'Data berasil dihapus',
            ]);
        } else {
            Swal::error([
                'title' => 'Data gagal dihapus',
            ]);
        }

        return to_route('categories.index');
    }
}
