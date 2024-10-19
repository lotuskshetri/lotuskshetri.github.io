<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Mail\OrderPlaced;
use App\Models\Address;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Title;
use Livewire\Component;
use Stripe\Checkout\Session;
use Stripe\Stripe;

#[Title('Checkout')]

class CheckoutPage extends Component
{
    public $firstName;
    public $lastName;
    public $phone;
    public $streetAddress;
    public $city;
    public $paymentMethod;

    public function mount()
    {
        $cartItems = CartManagement::getCartItemsFromCookie();

        if(count($cartItems) == 0){
            return redirect('/products');
        }
    }

    public function placeOrder()
    {   
        $this->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'phone' => 'required|max:10',
            'streetAddress' => 'required',
            'city' => 'required',
            'paymentMethod' => 'required',
        ]);

        $cartItems = CartManagement::getCartItemsFromCookie();

        $line_items = [];

        foreach ($cartItems as $item) {
            $line_items[] = [
                'price_data' => [
                    'currency' => 'npr',
                    'unit_amount' => $item['unit_amount'] * 100,
                    'product_data' => [
                        'name' => $item['name'],
                    ]
                    ],
                'quantity' => $item['quantity'],
            ];
        }

        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->grand_total = CartManagement::calculateGrandTotal($cartItems);
        $order->payment_method = $this->paymentMethod;
        $order->payment_status = 'pending';
        $order->status = 'new';
        $order->currency = 'npr';
        $order->shipping_amount = 0;
        $order->shipping_method = 'none';
        $order->notes = "Order placed by {$this->firstName} {$this->lastName}";
        
        $address = new Address();
        $address->first_name = $this->firstName;
        $address->last_name = $this->lastName;
        $address->phone = $this->phone;
        $address->address = $this->streetAddress;
        $address->city = $this->city;

        $redirect_url = '';

        if($this->paymentMethod == 'stripe') {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $sessionCheckout = Session::create([
                'payment_method_types' => ['card'],
                'customer_email' => auth()->user()->email,
                'line_items' => $line_items,
                'mode' => 'payment',
                'success_url' => route('success').'?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('cancel'),
            ]);

            $redirect_url = $sessionCheckout->url;
        }else{
            $redirect_url = route('success');
        }

        $order->save();
        $address->order_id = $order->id;
        $address->save();
        $order->items()->createMany($cartItems);
        CartManagement::clearCartItems();
        Mail::to(request()->user())->send(new OrderPlaced($order));
        return redirect($redirect_url);
    }

    public function render()
    {
        $cartItems = CartManagement::getCartItemsFromCookie();
        $grandTotal = CartManagement::calculateGrandTotal($cartItems);

        return view('livewire.checkout-page',['cartItems' => $cartItems, 'grandTotal' => $grandTotal]);
    }
}
