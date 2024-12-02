<section id="section-my-order-detail">
    <div class="order-detail-container">
        <h4>Detalhes do pedido</h4>
        <div class="order-detail-info-row">
            <div class="order-detail-info-row-item">
                <i class="fa-regular fa-user"></i>
                <div>
                    <p class="p-medium">Cliente</p>
                    <p class="p-medium-gray">{{ $address->full_name }}</p>
                </div>
            </div>

            <div class="order-detail-info-row-item">
                <i class="fa-regular fa-user"></i>
                <div>
                    <p class="p-medium">Data</p>
                    <p class="p-medium-gray">{{ $order_items[0]->created_at->format('d / m / y') }}</p>
                </div>
            </div>

            <div class="order-detail-info-row-item">
                <i class="fa-regular fa-user"></i>
                <div>
                    <p class="p-medium">Status</p>
                    <p class="p-medium-gray">{{ $order->status }}</p>
                </div>
            </div>

            <div class="order-detail-info-row-item">
                <i class="fa-regular fa-user"></i>
                <div>
                    <p class="p-medium">Status de pagamento</p>
                    <p class="p-medium-gray">{{ $order->payment_status }}</p>
                </div>
            </div>
        </div>

        <div class="order-detail-summary">
            <div class="order-detail-products">
                <table class="order-detail-table">
                    <tr>
                        <td class="p-medium">Imagem</td>
                        <td class="p-medium">Produto</td>
                        <td class="p-medium">Preço</td>
                        <td class="p-medium">Quantidade</td>
                        <td class="p-medium">Total</td>
                    </tr>
    
                    @foreach ($order_items as $item)
                        <tr wire:key="{{ $item->id }}">
                            <td><img src="{{ url('storage', $item->product->images[0]) }}" alt="{{ $item->name }}"></td>
                            <td class="p-medium-gray">{{ $item->product->name }}</td>
                            <td class="p-medium-gray">{{ Number::currency($item->unit_amount, 'BRL') }}</td>
                            <td class="p-medium-gray">{{ $item->quantity }}</td>
                            <td class="p-medium-gray">{{ Number::currency($item->total_amount, 'BRL') }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            
            <div class="order-detail-total">
                <h4>Resumo</h4>
                <div class="order-detail-price-row">
                    <p class="p-medium-gray">Subtotal</p>
                    <p class="p-medium-gray">{{ Number::currency($item->order->grand_total, 'BRL') }} </p>
                </div>
                <div class="order-detail-price-row">
                    <p class="p-medium-gray">Taxas</p>
                    <p class="p-medium-gray">{{ Number::currency(0, 'BRL')}}</p>
                </div>
                <div class="order-detail-price-row">
                    <p class="p-medium-gray">Frete</p>
                    <p class="p-medium-gray">{{ Number::currency(0, 'BRL')}}</p>
                </div>
                <div class="div-line-margin"></div>
                <div class="order-detail-price-row">
                    <p class="p-medium">Total</p>
                    <p class="p-medium">{{ Number::currency($item->order->grand_total, 'BRL')}}</p>
                </div>
            </div>
        </div>
    </div>
</section>