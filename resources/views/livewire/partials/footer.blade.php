<footer>
    
    <div class="con-grid-footer">

        <div class="footer-logo">
            <img src="{{ asset('img/Logo-Simple-Cat.svg')}}" alt="Logo Simple Cat">
            <div class="footer-icons">
                <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
            </div>
        </div>

        <div class="footer-list">
            <h5>Navegação</h5>
            <a href="/">Início</a>
            <!--<a href="">Categorias</a>-->
            <a href="/products">Produtos</a>
            <a href="#" onclick="open_cart('cart-bg' ,'show-display-flex')">Sacola</a>
            <!--<a href="">Pesquisar</a>-->
            
        </div>

        <div class="footer-list">
            <h5>Usuário</h5>
            <!--<a href="">Minha conta</a>-->
            <a href="/my-orders">Acompanhar pedido</a>
            <!--<a href="">Meus dados</a>-->
            <a href="/login">Entrar | Cadastrar</a>
        </div>

        <div class="footer-list">
            <h5>Dúvidas</h5>
            <a href="">Política de privacidade</a>
            <a href="">Troca e devolução</a>
            <a href="">Política de frete grátis</a>
            <a href="">Sobre nós</a>
        </div>

        <div class="con-footer-dropdown" onclick="open_dropdown('dropdown-navigation', 'show-display-flex')">
            <div class="footer-head-dropdown">
                <h5>Navegação</h5>
                <i class="fa-solid fa-chevron-down"></i>
            </div>
            <div class="footer-line"></div>
            <div class="footer-dropdown-list" id="dropdown-navigation">
                <a href="/">Início</a>
                <!--<a href="">Categorias</a>-->
                <a href="/products">Produtos</a>
                <a href="#" onclick="open_cart('cart-bg' ,'show-display-flex')">Sacola</a>
                <!--<a href="">Pesquisar</a>-->
                
            </div>
        </div>

        <div class="con-footer-dropdown" onclick="open_dropdown('dropdown-user', 'show-display-flex')">
            <div class="footer-head-dropdown">
                <h5>Usuário</h5>
                <i class="fa-solid fa-chevron-down"></i>
            </div>
            <div class="footer-line"></div>
            <div class="footer-dropdown-list" id="dropdown-user">
                <!--<a href="">Minha conta</a>-->
                <a href="/my-orders">Acompanhar pedido</a>
                <!--<a href="">Meus dados</a>-->
                <a href="/login">Entrar | Cadastrar</a>
            </div>
        </div>

        <div class="con-footer-dropdown" onclick="open_dropdown('dropdown-question', 'show-display-flex')">
            <div class="footer-head-dropdown">
                <h5>Dúvidas</h5>
                <i class="fa-solid fa-chevron-down"></i>
            </div>
            <div class="footer-line"></div>
            <div class="footer-dropdown-list" id="dropdown-question">
                <a href="">Política de privacidade</a>
                <a href="">Troca e devolução</a>
                <a href="">Política de frete grátis</a>
                <a href="">Sobre nós</a>
            </div>
        </div>

    </div>

    <div class="footer-info-bottom">
        <span class="p-small-gray">© Simple Cat - 2024</span>
        <span class="p-small-gray">CNPJ: 53.809.675/0001-42</span>
    </div>
    
    
</footer>