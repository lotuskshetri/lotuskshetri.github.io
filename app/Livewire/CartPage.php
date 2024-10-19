<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use Livewire\Attributes\Title;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('Cart')]

class CartPage extends Component
{
    use LivewireAlert;
    public $cartItems = [];
    public $grandTotal;

    public function mount()
    {
        $this->cartItems = CartManagement::getCartItemsFromCookie();
        $this->grandTotal = CartManagement::calculateGrandTotal($this->cartItems);
    }

    public function removeItem($product_id)
    {
        $cartItems = CartManagement::removeCartItems($product_id);
        $this->cartItems = $cartItems;
        $this->grandTotal = CartManagement::calculateGrandTotal($this->cartItems);
        $this->dispatch('update-cart-count', total_count: count($this->cartItems))->to(Navbar::class);

        $this->alert('error', 'Product removed from Cart!', [
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
           ]);
    }

    public function increaseQuantity($product_id)
    {
        $this->cartItems = CartManagement::incrementItemQuantity($product_id); 
        $this->grandTotal = CartManagement::calculateGrandTotal($this->cartItems);   
    }

    public function decreaseQuantity($product_id)
    {
        $this->cartItems = CartManagement::decrementItemQuantity($product_id); 
        $this->grandTotal = CartManagement::calculateGrandTotal($this->cartItems);   
    }

    public function render()
    {
        return view('livewire.cart-page');
    }
}
