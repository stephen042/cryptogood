<?php

namespace App\Livewire\Admin\EditUser;

use Livewire\Component;

class EditSignalStrength extends Component
{
    public $user;
    public $signal_strength;

    public function updateSignalStrength(){
        $this->validate([
            'signal_strength' => 'required',
        ]);

        $this->user->signal_strength = $this->signal_strength;
        $this->user->save();

        $this->dispatch('notify', type: 'success', message: 'User Signal strength progress bar has been updated');
    }
    public function render()
    {
        return view('livewire.admin.edit-user.edit-signal-strength');
    }
}
