<?php

namespace App\Helpers;

use App\Models\Product;
use Illuminate\Support\Facades\Cookie;

class CartManagement
{
    // add item to cart
    static public function addItemsTOCart($product_id)
    {
        $cartItems = self::getCartItemsFromCookie();

        $existingItem = null;

        foreach($cartItems as $key=>$item){
            if($item['product_id'] == $product_id){
                $existingItem = $key;
                break;
            }
        }
        if($existingItem !== null){
            $cartItems[$existingItem]['quantity']++;
            $cartItems[$existingItem]['total_amount'] = $cartItems[$existingItem]['quantity'] * $cartItems[$existingItem]['unit_amount'];
        }else{
            $product = Product::where('id', $product_id)->first(['id', 'name', 'price', 'images']);
            if($product){
                $cartItems[] = [
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'unit_amount' => $product->price,
                    'quantity' => 1,
                    'total_amount' => $product->price,
                    'image' => $product->images[0]
                ];
            }
        }

        self::addCartItemsToCookie($cartItems);
        return count($cartItems);
    }

    //add item to cart with quantity
    static public function addItemsTOCartWithQuantity($product_id, $qty)
    {
        $cartItems = self::getCartItemsFromCookie();

        $existingItem = null;

        foreach($cartItems as $key=>$item){
            if($item['product_id'] == $product_id){
                $existingItem = $key;
                break;
            }
        }
        if($existingItem !== null){
            $cartItems[$existingItem]['quantity'] = $qty;
            $cartItems[$existingItem]['total_amount'] = $cartItems[$existingItem]['quantity'] * $cartItems[$existingItem]['unit_amount'];
        }else{
            $product = Product::where('id', $product_id)->first(['id', 'name', 'price', 'images']);
            if($product){
                $cartItems[] = [
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'unit_amount' => $product->price,
                    'quantity' => $qty,
                    'total_amount' => $product->price * $qty,
                    'image' => $product->images[0]
                ];
            }
        }

        self::addCartItemsToCookie($cartItems);
        return count($cartItems);
        dd($cartItems);
    }

    // remove item from cart
    static public function removeCartItems($product_id)
    {
        $cartItems = self::getCartItemsFromCookie();

        foreach($cartItems as $key=>$item){
            if($item['product_id'] == $product_id){
                unset($cartItems[$key]);
            }
        }

        self::addCartItemsToCookie($cartItems);
        return $cartItems;
    }


    // add cart items to cookie
    static public function addCartItemsToCookie($cartItems)
    {
        Cookie::queue('cartItems', json_encode($cartItems), 60 * 24 * 30); //cookie expires in 30 days
    }

    // clear cart items from cookie
    static public function clearCartItems()
    {
        Cookie::queue(Cookie::forget('cartItems'));
    }

    // get all cart items from cookie
    static public function getCartItemsFromCookie()
    {
        $cartItems = json_decode(Cookie::get('cartItems'), true); //true for associative array

        if (!$cartItems) {
            $cartItems = [];
        }
        return $cartItems;
    }
    

    // increment item quantity
    static public function incrementItemQuantity($product_id)
    {
        $cartItems = self::getCartItemsFromCookie();

        foreach($cartItems as $key=>$item){
            if($item['product_id'] == $product_id){
                if($cartItems[$key]['quantity'] < 10){
                    $cartItems[$key]['quantity']++;
                    $cartItems[$key]['total_amount'] = $cartItems[$key]['quantity'] * $cartItems[$key]['unit_amount'];
                }
            }
        }

        self::addCartItemsToCookie($cartItems);
        return $cartItems;
    }


    // decrement item quantity
    static public function decrementItemQuantity($product_id)
    {
        $cartItems = self::getCartItemsFromCookie();

        foreach($cartItems as $key=>$item){
            if($item['product_id'] == $product_id){
                if($cartItems[$key]['quantity'] > 1){
                    $cartItems[$key]['quantity']--;
                    $cartItems[$key]['total_amount'] = $cartItems[$key]['quantity'] * $cartItems[$key]['unit_amount'];
                }
            }
        }

        self::addCartItemsToCookie($cartItems);
        return $cartItems;
    }


    // calculate grand total
    static public function calculateGrandTotal($cartItems)
    {
        return array_sum(array_column($cartItems, 'total_amount'));
    }
}