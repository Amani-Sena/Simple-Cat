<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Meus pedidos - Simple Cat')]
class MyOrdersPage extends Component {

    use WithPagination;

    public function render() {
        $my_orders = Order::where('user_id', auth()->id())->latest()->paginate(8);
        return view('livewire.my-orders-page', [
            'my_orders' => $my_orders,
        ]);
    }
}
