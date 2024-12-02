<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Produtos - Simple Cat')]
class ProductsPage extends Component {

    use WithPagination;

    #[Url()]
    public $selected_categories = [];

    #[Url()]
    public $selected_brands = [];

    #[Url()]
    public $sort = 'latest';

    public function render() {
        $productQuery = Product::query()->where('is_active', 1);

        if(!empty($this->selected_categories)) {
            $productQuery->whereIn('category_id', $this->selected_categories);
        }

        if(!empty($this->selected_brands)) {
            $productQuery->whereIn('brand_id', $this->selected_brands);
        }

        if($this->sort == 'latest') {
            $productQuery->latest();
        }

        if($this->sort == 'min_price') {
            $productQuery->orderBy('price', 'asc');
        }

        if($this->sort == 'max_price') {
            $productQuery->orderBy('price', 'desc');
        }

        if($this->sort == 'a_z') {
            $productQuery->orderBy('name', 'asc');
        }

        if($this->sort == 'z_a') {
            $productQuery->orderBy('name', 'desc');
        }

        return view('livewire.products-page', [
            'products' => $productQuery->paginate(8),
            'brands' => Brand::where('is_active', 1)->get(['id', 'name', 'slug']),
            'categories' => Category::where('is_active', 1)->get(['id', 'name', 'slug']),
        ]);
    }
}
