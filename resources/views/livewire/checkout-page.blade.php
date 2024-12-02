<div class="checkout-container">
    <div class="checkout-info">
        <form class="form-adress" wire:submit.prevent="placeOrder">
            <h4>1. Entrega</h4>
            <div class="checkout-input-container">
                <input class="input-default-width-100" type="text" placeholder="Endereço" wire:model='street_address'>
                @error('street_address')<p class="p-small red">{{ $message }}</p>@enderror

                <div class="input-container-row">
                    <div class="input-container-column-33">
                        <input class="input-default-width-100" type="text" placeholder="Cidade" wire:model='city'>
                        @error('city')<p class="p-small red">{{ $message }}</p>@enderror
                    </div>
        
                    <div class="input-container-column-33">
                        <input class="input-default-width-100" type="text" placeholder="Estado" wire:model='state'>
                        @error('state')<p class="p-small red">{{ $message }}</p>@enderror
                    </div>
                        
                    <div class="input-container-column-33">
                        <input class="input-default-width-100" type="text" placeholder="CEP" wire:model='zip_code'>
                        @error('zip_code')<p class="p-small red">{{ $message }}</p>@enderror
                    </div>     
                </div>
                

                

                <div class="input-container-row">
                    <div class="input-container-column-33">
                        <input class="input-default-width-100" type="text" placeholder="Nome" wire:model='first_name'>
                        @error('first_name')<p class="p-small red">{{ $message }}</p>@enderror
                    </div>
                    
                    <div class="input-container-column-33">
                        <input class="input-default-width-100" type="text" placeholder="Sobrenome" wire:model='last_name'>
                        @error('last_name')<p class="p-small red">{{ $message }}</p>@enderror
                    </div>

                    <div class="input-container-column-33">
                        <input class="input-default-width-100" type="number" placeholder="Telefone" wire:model='phone'>
                        @error('phone')<p class="p-small red">{{ $message }}</p>@enderror
                    </div>
                </div>
                

                

                
                
                
                
                
                

                
            </div>
            <h4>2. Método de pagamento</h4>
            <div class="checkout-radio-container">
                
                <input type="radio" wire:model='payment_method' id="cash" value="cod">
                <label for="cash">
                    <div class="payment-input">
                        <p class="p-big">Pix</p>
                    </div>
                </label>

                
                <input type="radio" wire:model='payment_method' id="credit-card" value="stripe">
                <label for="credit-card">
                    <div class="payment-input">
                        <p class="p-big">Cartão de crédito</p>
                    </div>
                </label>
                
            </div>
            @error('payment_method')
                <p class="p-small red">{{ $message }}</p>
            @enderror
            
        
    </div>
    <div class="checkout-summary">
       <h4>Resumo do pedido</h4>
       <div class="checkout-summary-list">
            @foreach ($cart_items as $item)
                <div class="checkout-summary-item" wire:key={{ $item['product_id'] }}>
                    <div class="checkout-summary-img"><img src="{{ url('storage', $item['image']) }}" alt="{{ $item['name'] }}"></div>
                    <div class="checkout-summary-info">
                        <p class="p-medium">{{ $item['name'] }}</p>
                        <p class="p-small-gray">Quantidade: {{ $item['quantity'] }}</p>
                        <p class="p-small-gray">{{ Number::currency($item['total_amount'], 'BRL') }}</p>
                    </div>
                </div>
            @endforeach
            
       </div>

       <div class="checkout-summary-total">
            <div class="checkout-summary-price">
                <div>
                    <p class="p-medium-gray">Subtotal</p>
                    <p class="p-medium-gray">{{ Number::currency($grand_total, 'BRL')}}</p>
                </div>
                
                <div>
                    <p class="p-medium-gray">Entrega</p>
                    <p class="p-medium-gray">{{ Number::currency(0, 'BRL')}}</p>
                </div>
                <div class="div-line"></div>
                <div>
                    <p class="p-medium">Total</p>
                    <p class="p-medium">{{ Number::currency($grand_total, 'BRL')}}</p>
                </div>
                
            </div>
            
            <button type="submit" class="btn-default"><span wire:loading.remove>Completar o pedido</span><span wire:loading>Processando...</span></button>
       </div>
       
    </div>
</div>
</form>