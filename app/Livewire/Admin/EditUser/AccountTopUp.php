<?php

namespace App\Livewire\Admin\EditUser;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AccountTopUp extends Component
{
    public $user;

    public $credit_bal_amount;
    public $credit_earn_bal_amount;

    public $debit_bal_amount;
    public $debit_earn_bal_amount;

    public $network_fee_amount;

    public $title;
    public $message;

    public function mount($user)
    {
        $this->user = $user;
        $this->network_fee_amount = $user->gas_fee ?? 0;

        $this->title = $user->admin_messages()->first()->title;
        $this->message = $user->admin_messages()->first()->message;
    }

    public function credit_balance()
    {
        $this->validate([
            'credit_bal_amount' => 'required|numeric|min:0',
        ]);

        $this->user->balance += $this->credit_bal_amount;
        $this->user->save();

        redirect(route('admin.edit-user', [$this->user]));
        return $this->dispatch('notify', type: 'success', message: 'User balance has been credited');
    }

    public function credit_earn_balance()
    {
        $this->validate([
            'credit_earn_bal_amount' => 'required|numeric|min:0',
        ]);

        $this->user->earnings_balance += $this->credit_earn_bal_amount;
        $this->user->save();

        redirect(route('admin.edit-user', [$this->user]));
        return $this->dispatch('notify', type: 'success', message: 'User Earnings balance has been credited');
    }
    public function debit_balance()
    {
        $this->validate([
            'debit_bal_amount' => 'required|numeric|min:0',
        ]);

        if ($this->user->balance < $this->debit_bal_amount) {
            $this->dispatch('notify', type: 'error', message: 'User balance is not enough');
            return;
        }

        $this->user->balance -= $this->debit_bal_amount;
        $this->user->save();

        redirect(route('admin.edit-user', [$this->user]));
        return $this->dispatch('notify', type: 'success', message: 'User balance has been debited',);
    }
    public function debit_earns_balance()
    {
        $this->validate([
            'debit_earn_bal_amount' => 'required|numeric|min:0',
        ]);

        if ($this->user->earnings_balance < $this->debit_earn_bal_amount) {
            $this->dispatch('notify', type: 'error', message: 'User earnings balance is not enough');
            return;
        }

        $this->user->earnings_balance -= $this->debit_earn_bal_amount;
        $this->user->save();

        redirect(route('admin.edit-user', [$this->user]));
        return $this->dispatch('notify', type: 'success', message: 'User earnings balance has been debited');
    }

    public function network_fee_top_up()
    {
        $this->validate([
            'network_fee_amount' => 'required|min:0',
        ]);

        $this->user->gas_fee = $this->network_fee_amount;
        $this->user->save();

        redirect(route('admin.edit-user', [$this->user]));
        return $this->dispatch('notify', type: 'success', message: 'User network fee has been updated');
    }

    public function saveAdminMessage()
    {
        $this->validate([
            'title' => 'string|max:255',
            'message' => 'string',
        ]);

        $user = $this->user;

        $adminMessage = $user->admin_messages()->first();

        if ($adminMessage) {
            // Update existing message
            $adminMessage->update([
                'title' => $this->title,
                'message' => $this->message,
            ]);
        } else {
            // Insert new message
            $user->admin_messages()->create([
                'title' => $this->title,
                'message' => $this->message,
            ]);
        }

        return $this->dispatch('notify', type: 'success', message: 'Admin message to user has been updated');
    }


    public function render()
    {
        return view('livewire.admin.edit-user.account-top-up');
    }
}
