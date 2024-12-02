<section id="section-my-orders">
    <div class="my-orders-container">
        <table class="my-orders-table">
            <tr>
                <td class="p-large">Pedidos</td>
                <td class="p-large">Data</td>
                <td class="p-large">Status</td>
                <td class="p-large">Pagamento</td>
                <td class="p-large">Total</td>
                <td class="p-large">Detalhes</td>
            </tr>
        
            @foreach ($my_orders as $order)
                <tr wire:key='{{ $order->id }}'>
                    <td class="p-medium">{{ $order->id }}</td>
                    <td class="p-medium">{{ $order->created_at->format('d / m / y') }}</td>
                    <td class="p-medium">{{ $order->status }}</td>
                    <td class="p-medium">{{ $order->payment_status}}</td>
                    <td class="p-medium">{{ Number::currency($order->grand_total, 'BRL')}}</td>
                    <td class="p-medium"><a href="/my-orders/{{ $order->id }}">Ver detalhes</a></td>
                </tr>
            @endforeach
    </table>
        {{ $my_orders->links('pagination::bootstrap-4') }}
    </div>
</section>