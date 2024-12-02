
      <!-- Swiper -->
      <section>
        <section id="section-hero">
          <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide"><img src="img/Star-wars-collection.avif" alt=""></div>
              <div class="swiper-slide"><img src="img/Spider-man-collection.avif" alt=""></div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </section>
    
        <section id="section-benefits">
          <div><span><i class="fa-solid fa-check"></i>Frete Grátis</span></div>
          <div><span><i class="fa-solid fa-tag"></i>Desconto a vista</span></div>
          <div><span><i class="fa-solid fa-percent"></i>20% OFF</span></div>
          <div><span><i class="fa-solid fa-dollar-sign"></i>Cashback</span></div>
          <div><span><i class="fa-solid fa-shirt"></i>Do PP ao 5G</span></div>
          <div><span><i class="fa-solid fa-calculator"></i>Até 6x Sem juros</span></div>
          

        </section>

        <section id="section-products">

            <div class="title-left-section">
              <h1>Lançamentos <a href="/products"> | Ver mais <i class="fa-solid fa-chevron-right"></i></a></h1>
            </div>

            <!-- Swiper -->
            <div class="swiper-list mySwiperList">
              <div class="swiper-wrapper">
                
                @foreach ($products as $product)
                
                  <div class="swiper-slide" wire:key='{{ $product->id }}'>
                    <a href="/products/{{ $product->slug}}">
                    <div class="con-product-line">
                      <div class="product-img"><img src="{{ url('storage', $product->images[0])}}" alt=""></div>
                        <div class="product-info">
                          <p class="p-small-gray">{{ $product->brand->name }}</p>
                        <span class="p-medium">{{ $product->name }}</span>
                        
                          <p class="p-medium">{{ Number::currency($product->price, 'BRL') }}</p>
                        
                      </div>
                    </div>
                  </a>
                  </div>
                
                @endforeach

              </div>
              <div class="swiper-pagination"></div>
            </div>
        </section>

        <section id="section-categories">

          <div class="title-left-section">
            <h1>Categorias <a href="/products"> | Ver mais <i class="fa-solid fa-chevron-right"></i></a></h1>
          </div>
          

          <div class="mosaico-categories">
            @foreach ($categoriesLimit as $category)
              <div class="mosaico-item" wire:key="{{ $category->id }}">
                <a href="/products?selected_categories[0]={{ $category->id }}">
                  <img src="{{ url('storage', $category->image)}}" alt="Camiseta Cover">
                  <h1>{{ $category->name }}</h1>
                </a>
              </div>
            @endforeach
          </div>


        </section>

        <section id="section-best-sellers">
          <div class="title-left-section">
            <h1>Mais vendidos <a href="/products"> | Ver mais <i class="fa-solid fa-chevron-right"></i></a></h1>
          </div>

          <div class="swiper-list mySwiperList">
            <div class="swiper-wrapper">
              
              @foreach ($products as $product)
                  <div class="swiper-slide" wire:key='{{ $product->id }}'>
                    <div class="con-product-line">
                      <div class="product-img"><a href="#"><img src="{{ url('storage', $product->images[0])}}" alt=""></a></div>
                        <a href="#"><div class="product-info">
                          <p class="p-small-gray">{{ $product->brand->name }}</p>
                        <span class="p-medium">{{ $product->name }}</span>
                        
                          <p class="p-medium">{{ Number::currency($product->price, 'BRL') }}</p>
                        
                      </div></a>
                    </div>
                  </div>
                @endforeach

            </div>
            <div class="swiper-pagination"></div>
          </div>
        </section>

        
      </section>
      




