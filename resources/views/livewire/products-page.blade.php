<div>


<section id="section-page-products-head">
    <div class="products-page-title">
        <h1>Produtos</h1>
        <div class="div-line"></div>
    </div>
    <div class="products-page-filters" >

        <div class="products-page-con-filters" onclick="open_dropdown('products-page-filters-dropdown', 'show-display-flex')">
            <button class="btn-default"><i class="fa-solid fa-filter"></i> Filtrar</button>
            <div class="products-page-filters-dropdown" id="products-page-filters-dropdown">
                <div class="products-page-filters-list">
                    <div class="products-page-filters-container">
                        <h5>Marca</h5>

                        @foreach ($brands as $brand)
                            <div class="products-page-filters-item" wire:key=" {{ $brand->id }}">
                                <input type="checkbox" wire:model.live="selected_brands" id="{{ $brand->slug}}" value="{{ $brand->id}}">
                                <label for="{{ $brand->slug}}">{{ $brand->name }}</label>
                            </div>
                        @endforeach
                        
                        
                    </div>
    
                    <div class="products-page-filters-container">
                        <h5>Categorias</h5>
                        @foreach ($categories as $category)
                            <div class="products-page-filters-item" wire:key="{{ $category->id }}">
                                <input type="checkbox" wire:model.live="selected_categories" id="{{ $category->slug }}" value="{{ $category->id }}">
                                <label for="{{ $category->slug }}">{{ $category->name }}</label>
                            </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
            
        </div>

        <div class="products-page-con-order">
            <!--<button class="btn-bottom">Lançamentos <i class="fa-solid fa-caret-down"></i></button>-->
            <!--<div class="products-page-order-dropdown" id="products-page-order-dropdown">-->
                <div class="container-select">
                    <select class="btn-bottom-select" wire:model.live="sort">
                </div>
                        <option value="latest">Lançamentos</option>
                        <option value="a_z">A - Z</option>
                        <option value="z_a">Z - A</option>
                        <option value="min_price">Menor preço</option>
                        <option value="max_price">Maior preço</option>
                </select>
            <!--</div>-->
        </div>
        
    </div>
</section>

<section id="section-page-products-container">
    <div class="products-page-list">

        @foreach ($products as $product)
        <a href="/products/{{ $product->slug }}">
            <div class="products-page-item" wire:key="{{ $product->id }}">
                
                    <div class="product-page-img">
                        <img src="{{ url('storage', $product->images[0] ) }}" alt=" {{ $product->name}} ">
                    </div>
                    
                    <div class="products-page-info">
                        <p class="p-small-gray">Simple Cat</p>
                        <h5>{{ $product->name}}</h5>
                        <p class="p-medium black">{{ Number::currency($product->price, 'BRL')}}</p>
                        <p class="p-small-gray"><em class="green">6x</em> sem juros</p>
                        <p class="p-small-gray"><em class="green">5% OFF</em> no Pix</p>
                    </div> 
            </div>
        </a>
        @endforeach
    </div>
    <div class="pagination">
        {{ $products->links('pagination::bootstrap-4') }}
    </div>
    
</section>

</div>