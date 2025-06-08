<?php

namespace App\Livewire\Berita;

use App\Models\Post;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Daftar berita')]
class Index extends Component
{
    use WithPagination;

    public function paginationView()
    {
        return 'components.custom-paginator';
    }

    public function render()
    {
        $berita = Post::with('category')->where('published', 1)->paginate(9);

        return view('frontend.berita.index')->with(['beritas' => $berita]);
    }
}
