<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Forgot Password')]

class ForgotPasswordPage extends Component
{
    public $email;

    public function forgot_password()
    {
        $this->validate([
            'email' => 'required|email|max:255|exists:users,email',
        ]);
        
        // dd($this->email);
        $status = Password::sendResetLink(['email' => $this->email]);
        // dd($status);

        if($status === Password::RESET_LINK_SENT) {
            session()->flash('success', 'Password reset link sent on your email id.');
            $this->email = '';  //reset email field
        }
    }


    public function render()
    {
        return view('livewire.auth.forgot-password-page');
    }
}
