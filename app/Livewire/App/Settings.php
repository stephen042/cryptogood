<?php

namespace App\Livewire\App;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Settings extends Component
{
    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    public function updatePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($this->current_password, Auth::user()->password)) {
            $this->addError('current_password', 'Your current password is incorrect.');
            return;
        }

        Auth::user()->update([
            'password' => Hash::make($this->new_password),
        ]);

        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);

        // fire a browser event
        $this->dispatch('password-updated');
    }


    public function render()
    {
        return view('livewire.app.settings');
    }
}
