<?php

namespace App\Livewire\Extra;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('About Us')]
class AboutUs extends Component
{
    public function render()
    {
        return view('livewire.extra.about-us');
    }
}
