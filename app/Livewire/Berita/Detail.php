<?php

namespace App\Livewire\Berita;

use App\Models\Category;
use App\Models\Post;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Detail berita')]
class Detail extends Component
{
    public $post;

    public $categories;

    public function mount($slug)
    {
        $this->post = Post::whereSlug($slug)->first();
        $this->categories = Category::get();
        SEOMeta::setTitle($this->post->title);
        SEOMeta::setDescription(Str::limit($this->post->body, 70));
        SEOTools::setTitle($this->post->title);
        SEOTools::setDescription(Str::limit($this->post->body, 70, '...'));
        SEOTools::opengraph()->setUrl('http://current.url.com');
        SEOTools::setCanonical('https://codecasts.com.br/lesson');
        SEOTools::opengraph()->addProperty('type', 'berita');
        OpenGraph::setTitle($this->post->title)
            ->setDescription(Str::limit($this->post->body, 70))
            ->setType('berita')
            ->setArticle([
                'published_time' => $this->post->created_at,
                'modified_time' => $this->post->updated_at,
                'author' => $this->post->penulis,
                'tag' => $this->post->category->category,
            ]);
        // SEOTools::twitter()->setSite('@LuizVinicius73');
        SEOTools::jsonLd()->addImage(asset('storage/public/berita/'.$this->post->image));
    }

    public function render()
    {

        return view('frontend.berita.detail');
    }
}
