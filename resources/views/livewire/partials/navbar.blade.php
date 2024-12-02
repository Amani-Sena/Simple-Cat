
  <header>
    <nav>
      
      <a href="/"><img src="{{asset('img/Logo-Simple-Cat.svg')}}" alt="Logo Simple Cat"></a>
      <div>
        <a href="/" class="{{ request()->is('/') ? 'nav-link-selected' : 'nav-link' }}" >Início</a>
        <div class="dropdown-header" onclick="open_dropdown('dropdown-categories', 'show-display-grid')">
          <span id="header-categories" class="{{ request()->is('categories') ? 'nav-link-selected' : 'nav-link' }}">Categorias</span>
          <i class="fa-solid fa-sort-down"></i>
          <div class="dropdown-categories" id="dropdown-categories">
            @foreach ($categories as $category)
              <a href="/products?selected_categories[0]={{ $category->id }}" wire:key="{{ $category->id }}">{{ $category->name }}</a>
            @endforeach

            
          </div>
        </div>
        
        <a wire:navigate href="/products" class="{{ request()->is('products') ? 'nav-link-selected' : 'nav-link' }}">Produtos</a>
        <div class="navbar-con-icon">
          <a wire:navigate onclick="open_cart('cart-bg' ,'show-display-flex')" class="{{ request()->is('cart') ? 'nav-icon-selected' : 'nav-icon' }}"><i class="fa-solid fa-bag-shopping"></i> {{ $total_count }}</a>
          <!--<a wire:navigate href="/search" class="{{ request()->is('cart') ? 'nav-icon-selected' : 'nav-icon' }}"><i class="fa-solid fa-magnifying-glass"></i></a>-->
          @guest<a wire:navigate href="/login" class="btn-default" id="btn-login">Entrar</a>@endguest
          @auth <span class="p-large">{{ auth()->user()->name }}</span> <a href="/logout" class="btn-default">Sair</a>@endauth
          
        </div>
      </div>
      <div class="btn-menu-mobile" id="btn-menu" onclick="open_mobile_menu('mobile-menu')">
        <div class="line-1"></div>
        <div class="line-2"></div>
        <div class="line-3"></div>
      </div>
    </nav>



    <div class="mobile-menu close-menu" id="mobile-menu">
      <div class="con-mobile-menu">
        <h5>Menu</h5>
        <div class="menu-line"></div>
        <a href="/" class="{{ request()->is('/') ? 'nav-link-mobile-selected' : 'nav-link-mobile' }}" >Início</a>
        <a wire:navigate href="/categories" class="{{ request()->is('categories') ? 'nav-link-mobile-selected' : 'nav-link-mobile' }}">Categorias</a>
        <a wire:navigate href="/products" class="{{ request()->is('products') ? 'nav-link-mobile-selected' : 'nav-link-mobile' }}">Produtos</a>
        <a wire:navigate href="/cart" class="{{ request()->is('cart') ? 'nav-link-mobile-selected' : 'nav-link-mobile' }}">Sacola</a>
        
        <div class="mobile-menu-socials">
          <h5>Fale Conosco</h5>
          <div class="menu-line"></div>
          <div class="con-socials-icons">
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-facebook"></i></a>
            <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
          </div>
        </div>

        <div class="mobile-search">
          <input type="text" placeholder="Pesquisar">
        </div>

        <div class="con-mobile-login">
          <a href="/login">Entrar</a>
          <div></div>
          <a href="/register">Cadastrar</a>
        </div>

        
      </div>
      
    </div>
  </header>