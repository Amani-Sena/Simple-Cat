<section id="section-forgot">
    <div class="forgot-container">
        <form wire:submit.prevent='save' class="forgot-form">
            <h3>Recuperar senha</h3>
            <p class="p-small-gray">Se lembrou? <a href="/login">Entrar</a></p>
            <div class="div-line"></div>
            @if (session('success')) <p class="p-small green">{{ session('success') }}</p> @endif
            <input type="text" wire:model="email" placeholder="Email" class="input-default-width-100">
            @error('email')<p class="p-small red">{{ $message }}</p>@enderror
            <input type="submit" class="btn-default" value="Recuperar senha"></input>
        </form>
    </div>
    
</section>