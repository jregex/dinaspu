<?php

namespace App\Livewire;

use App\Models\GalleryCategory;
use App\Models\Post;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Beranda')]
class Home extends Component
{
    public $galleries;

    public $beritas;

    public function mount()
    {
        $this->galleries = GalleryCategory::with('galleries')->limit(10)->get();
        $this->beritas = Post::with('category')->where('published', 1)->limit(6)->get();
    }

    public function render()
    {

        return view('frontend.home');
    }
}
