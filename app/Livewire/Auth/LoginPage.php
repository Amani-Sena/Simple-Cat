<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Login')]
class LoginPage extends Component {

    public $email;
    public $password;

    public function save() {
        $this->validate([
            'email' => 'required|email|max:50|exists:users,email',
            'password' => 'required|min:8|max:100',
        ]);

        if(!auth()->attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->flash('error', 'Email ou senha invalidos');
            return;
        }

        return redirect()->intended();
    }

    public function render()
    {
        return view('livewire.auth.login-page');
    }
}
