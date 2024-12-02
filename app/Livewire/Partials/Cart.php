<?php

namespace App\Livewire\Partials;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use Livewire\Attributes\Url;
use Livewire\Component;

class Cart extends Component {

    #[Url()]
    public $quantity = 1;

    public $cart_items = [];

    public $grand_total;

    public function mount() {
        $this->cart_items = CartManagement::getCartItemsFromCookie();
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items);
    }

    public function addToCart($product_id, $number) {

        $total_count = CartManagement::addItemToCartWithQty($product_id, $number);
        $this->quantity + $product_id = $number;
        $this->dispatch('update-cart-count', total_count: $total_count)->to(Navbar::class);
    }

    //public function change_cart_item($quant) {
    //    $this->quantity = $quant;
    //}

    public function removeItem($product_id) {
        $this->cart_items = CartManagement::removeCartItem($product_id);
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items);
        $this->dispatch('update-cart-count', total_count: count($this->cart_items))->to(Navbar::class);
    }

    public function render() {
        $cart = CartManagement::getCartItemsFromCookie();

        return view('livewire.partials.cart', [
            'cart_item' => $cart,
        ]);
        
    }
}
