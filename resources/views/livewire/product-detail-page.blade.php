<section id="section-product-detail">
    <div class="product-detail-container">
        <div class="product-detail-img">
            <img src="{{ url('storage', $product->images[0] )}}" alt="Imagem do Produto">
        </div>

        <div class="product-detail-info">
            <div class="product-detail-title">
                <p class="p-small-gray">Simple Cat</p>
                <h3>{{ $product->name }}</h3>
            </div>
            <div class="div-line-margin"></div>
            <p class="p-medium">{{ Number::currency($product->price, 'BRL') }}</p>
            <p class="p-small-gray"><em class="green">6x</em> sem juros</p>
            <p class="p-small-gray"><em class="green">5% OFF</em>  à vista no Pix</p>
            <div class="div-line-margin"></div> 

            <div class="product-detail-size-color">
                <div class="product-detail-size-info">
                    <p class="p-medium">Tamanho</p>
                    <div class="product-detail-size-options">
                        <input type="radio" name="size" id="PP" value="PP">
                        <label for="PP">
                            <div class="input-size">
                                <span>PP</span>
                            </div>
                        </label>
                       
                            <input type="radio" name="size" id="P" value="P">
                            <label for="P">
                                <div class="input-size">
                                    <span>P</span>
                                </div>
                            </label>
                        
                            <input type="radio" name="size" id="M" value="M">
                            <label for="M">
                                <div class="input-size">
                                    <span>M</span>
                                </div>
                            </label>
                        
                            <input type="radio" name="size" id="G" value="G">
                            <label for="G">
                                <div class="input-size">
                                    <span>G</span>
                                </div>
                            </label>
                        
                            <input type="radio" name="size" id="GG" value="GG">
                            <label for="GG">
                                <div class="input-size">
                                    <span>GG</span>
                                </div>
                            </label>
                    </div>
                    </div>
                </div>

                <div class="product-button-cart">
                    <a wire:click.prevent='addToCart({{ $product->id }})' wire:loading.remove wire:target='addToCart({{ $product->id }})' href="#" class="btn-default">Adicionar à sacola</a>
                    <span wire:loading wire:target='addToCart({{ $product->id }})'>Adicionando...</span>
                </div>

            </div>
        </div>
    </div>
</section>