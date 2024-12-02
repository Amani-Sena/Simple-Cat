<section id="section-reset">
    <div class="reset-container">
        <form wire:submit.prevent='save' class="reset-form">
            <h3>Redefinir senha</h3>
            <div class="div-line"></div>
            @if (session('error')) <p class="p-small red">{{ session('error') }}</p> @endif
            <input type="password" wire:model="password" placeholder="Senha" class="input-default-width-100">
            @error('password')<p class="p-small red">{{ $message }}</p>@enderror
            <input type="password" wire:model="password_confirmation" placeholder="Confirme a senha" class="input-default-width-100">
            @error('password_confirmation')<p class="p-small red">{{ $message }}</p>@enderror
            <input type="submit" class="btn-default" value="Redefinir senha"></input>
        </form>
    </div>
</section>