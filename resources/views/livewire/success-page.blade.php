<section id="section-success">
    <div class="success-container">
        <h4>Obrigado, seu pedido foi recebido!</h4>
        <div class="success-user-info">
            <h5>{{ $order->address->full_name }}</h5>
            <p class="p-small-gray">{{ $order->address->street_address }}</p>
            <p class="p-small-gray">{{$order->address->city }}, {{ $order->address->state }} - {{ $order->address->zip_code }}</p>
            <p class="p-small-gray">Telefone: {{ $order->address->phone }}</p>
        </div>
        <div class="div-line"></div>
        
        <div class="success-order">
            <div class="success-order-info">
                <p class="p-medium">Número do pedido:</p>
                <p class="p-small-gray">{{ $order->id }}</p>
            </div>

            <div class="success-order-info">
                <p class="p-medium">Data:</p>
                <p class="p-small-gray">{{ $order->created_at->format('d / m / y') }}</p>
            </div>

            <div class="success-order-info">
                <p class="p-medium">Total:</p>
                <p class="p-small-gray">{{ Number::currency($order->grand_total, 'BRL')}}</p>
            </div>

            <div class="success-order-info">
                <p class="p-medium">Método de pagamento:</p>
                <p class="p-small-gray">{{ $order->payment_method == 'cod'? 'Pix': 'Cartão de crédito' }}</p>
            </div>
            
        </div>

        <div class="div-line"></div>

        <div class="success-order-final">
            <div class="success-order-details">
                <h4>Detalhes do pedido</h4>
                <div class="success-price-row">
                    <p class="p-medium-gray">Subtotal</p>
                    <p class="p-medium-gray">{{ Number::currency($order->grand_total, 'BRL')}}</p>
                </div>
                <div class="success-price-row">
                    <p class="p-medium-gray">Desconto</p>
                    <p class="p-medium-gray">{{ Number::currency(0, 'BRL')}}</p>
                </div>
                <div class="success-price-row">
                    <p class="p-medium-gray">Frete</p>
                    <p class="p-medium-gray">{{ Number::currency(0, 'BRL')}}</p>
                </div>
                <div class="div-line"></div>
                <div class="success-price-final">
                    <p class="p-medium">Total</p>
                    <p class="p-medium">{{ Number::currency($order->grand_total, 'BRL')}}</p>
                </div>

                <div class="success-buttons">
                    <a href="/" class="btn-default">Voltar para a loja</a>
                    <a href="/my-orders" class="btn-default">Ver meus pedidos</a>
                </div>
            </div>

            <div class="success-shipping">
                <h4>Entrega</h4>
                <div class="success-shipping-details">
                    <i class="fa-solid fa-truck-fast"></i>
                    <div class="success-shipping-method">
                        <p class="p-medium">Método de entrega</p>
                        <p class="p-medium-gray">Moovie</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>