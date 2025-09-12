<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Password;

class ForgotPassword extends Component
{
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => "required|email|exists:users,email",
        ]);

        Password::sendResetLink($this->only('email'));

        $this->dispatch('notify', type: 'success', message: 'A reset link will be sent if the account exists.');
    }
    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}
