<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Kontak')]
class Contact extends Component
{
    public function render()
    {
        return view('frontend.contact');
    }
}
