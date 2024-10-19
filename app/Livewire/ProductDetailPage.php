<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;


#[Title('Product Detail')]

class ProductDetailPage extends Component
{
    use LivewireAlert;
    public $slug;
    public $quantity = 1;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function increaseQuantity()
    {
        if ($this->quantity < 10) {
            $this->quantity++;
        }
    }

    public function decreaseQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function addToCart($id)
    {
        $total_count = CartManagement::addItemsTOCartWithQuantity($id, $this->quantity);
        $this->dispatch('update-cart-count', total_count: $total_count)->to(Navbar::class);

        $this->alert('success', 'Product added to Cart!', [
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
           ]);
    }

    public function render()
    {
        return view('livewire.product-detail-page', [
            'product' =>Product::where('slug', $this->slug)->firstOrFail(),
        ]);
    }
}
