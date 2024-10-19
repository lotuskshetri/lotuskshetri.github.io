<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('TechTonic')]

class HomePage extends Component
{
    public function render()
    {
        $brands = Brand::where('is_active', 1)->inRandomOrder()->take(4)->get();
        $categories = Category::where('is_active', 1)->inRandomOrder()->take(4)->get();
        return view('livewire.home-page', compact('brands', 'categories'));
    }
}
