<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Início - Simple Cat')]
class HomePage extends Component {
    public function render() {
        $categories = Category::where('is_active', 1)->where('name', )->get();
        $products = Product::where('is_active', 1)->get();
        $products = Product::with('brand')->where('is_active', 1)->get();
        $categoriesLimit = Category::where('is_active', 1)
                      ->limit(9)
                      ->get();
                      //dd($products);

        return view('livewire.home-page',[
            'categories' => $categories,
            'categoriesLimit' => $categoriesLimit,
            'products' => $products,
        ]);
    }
}
