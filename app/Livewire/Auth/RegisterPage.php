<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\StatefulGuard;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Registrar')]
class RegisterPage extends Component {

    public $name;
    public $email;
    public $password;

    // Registrar usuário
    public function save() {
        $this->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:60|email|unique:users',
            'password' => 'required|min:8|max:100'
        ]);

        // Salvar no banco de dados
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // Logar usuário
        auth()->login($user);

        // Redirecionar usuário
        return redirect()->intended();

    }

    public function render()
    {
        return view('livewire.auth.register-page');
    }
}
