<section id="section-login">
    <div class="login-container">
        <form wire:submit.prevent='save' class="login-form">
            <h3>Entrar</h3>
            <p class="p-small-gray">Não tem uma conta ainda? <a href="/register">Registre-se</a></p>
            <div class="div-line"></div>
            @if (session('error')) <p class="p-small red">{{ session('error') }}</p> @endif
            <input type="text" wire:model="email" placeholder="Email" class="input-default-width-100">
            @error('email')<p class="p-small red">{{ $message }}</p>@enderror
            <input type="password" wire:model="password" placeholder="Senha" class="input-default-width-100">
            @error('password')<p class="p-small red">{{ $message }}</p>@enderror
            <input type="submit" class="btn-default" value="Entrar"></input>
        </form>
    </div>
</section>