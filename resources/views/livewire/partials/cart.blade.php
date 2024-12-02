<div class="cart-bg" id="cart-bg">
<div class="cart">
    <div class="cart-title">    
        <div class="X-button" id="close-cart">
            <div class="X-button-item-1"></div>
            <div class="X-button-item-2"></div>
        </div>
        <h4>Sua sacola</h4>
    </div>
    <div class="cart-product-container">

    @forelse ($cart_items as $item)
        <div class="cart-product" wire:key='{{ $item['product_id'] }}'>
            <div class="cart-product-img">
                <img src="{{ url('storage', $item['image']) }}" alt="{{ $item['name'] }}">
            </div>
            <div class="cart-product-info">
                <div class="cart-product-info-list">
                    <h6>{{ $item['name'] }}</h6>
                    <p class="p-small-gray">Tamanho: M</p>
                    <p class="p-small-gray">Cor: Branca</p>
                    <div class="cart-product-price">
                        <select wire:model.live="quantity{{$item['product_id']}}" wire:target="addToCart({{ $item['product_id'] }}" wire:change="addToCart({{ $item['product_id'] }} ,$event.target.value)" name="units" id="units" class="btn-select">
                            @foreach (range(1, 10) as $quant)
                                @if($item['quantity']  == $quant)
                                    <option value="{{ $item['quantity'] }}" selected>{{ $item['quantity'] }}</option>
                                @else
                                    <option value="{{ $quant }}">{{ $quant }}</option>
                                @endif
                            @endforeach
                        </select>
                        <h6 class="gray">{{ Number::currency($item['total_amount'], 'BRL') }}</h6>
                    </div>
                    
                </div>
                <div class="cart-product-trash">
                    <a href="#" wire:click.prevent='removeItem({{ $item['product_id'] }})'><i class="fa-solid fa-trash"></i></a>
                </div>
            </div>
        </div>
    @empty
        <h4>Sacola vazia.</h4>
    @endforelse

</div>
    <div class="cart-checkout">
        <div class="cart-total">
            <span class="p-medium-gray">Subtotal: {{ Number::currency($grand_total, 'BRL') }}</span>
            <span class="p-medium-gray">Frete: {{ Number::currency(0, 'BRL') }}</span>
            <span class="p-medium-gray">Total: {{ Number::currency($grand_total, 'BRL') }}</span>
        </div>
        @if($cart_items)
        <a href="/checkout" class="btn-default">Finalizar compra</a>
        @endif
    </div>
    
</div>
</div>