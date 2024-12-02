<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Title('Detalhes do Produto - Simple Cat')]
class ProductDetailPage extends Component {
    public $slug;   

    public function mount($slug) {
        $this->slug = $slug;
    }

    // adicionar produto na sacola
    public function addToCart($product_id) {
        $total_count = CartManagement::addItemToCart($product_id);
        
        $this->dispatch('update-cart-count', total_count: $total_count)->to(Navbar::class);
    }

    public function render() {
        return view('livewire.product-detail-page', [
            'product' => Product::where('slug', $this->slug)->firstOrFail(),
        ]);
    }
}
