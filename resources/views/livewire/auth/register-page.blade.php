<section id="section-register">
    <div class="register-container">
        <form wire:submit.prevent='save' class="register-form">
            <h3>Registrar</h3>
            <p class="p-small-gray">Já tem uma conta? <a href="/login">Entrar</a></p>
            <div class="div-line"></div>
            <input type="text" wire:model="name" placeholder="Nome" class="input-default-width-100">
            @error('name')<p class="p-small red">{{ $message }}</p>@enderror
            <input type="text" wire:model="email" placeholder="Email" class="input-default-width-100">
            @error('email')<p class="p-small red">{{ $message }}</p>@enderror
            <input type="password" wire:model="password" placeholder="Senha" class="input-default-width-100">
            @error('password')<p class="p-small red">{{ $message }}</p>@enderror
            <input type="submit" class="btn-default" value="Registrar"></input>
        </form>
    </div>
</section>