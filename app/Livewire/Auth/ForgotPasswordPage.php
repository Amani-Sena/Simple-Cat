<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Recuperar senha - Simple Cat')]
class ForgotPasswordPage extends Component {

    public $email;

    public function save() {
        $this->validate([
            'email' => 'required|email|exists:users,email|max:100'
        ]);

        $status = Password::sendResetLink(['email' => $this->email]);

        if($status === Password::RESET_LINK_SENT) {
            session()->flash('success', 'Link de redefinição enviado para seu email!');
            $this->email = '';
        }
    }


    public function render() {
        return view('livewire.auth.forgot-password-page');
    }
}
