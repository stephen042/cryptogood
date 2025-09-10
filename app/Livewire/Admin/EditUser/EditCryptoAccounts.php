<?php

namespace App\Livewire\Admin\EditUser;

use Livewire\Component;

use function PHPSTORM_META\type;

class EditCryptoAccounts extends Component
{
    public $user;
    public $bitcoin;
    public $ethereum;
    public $solana;
    public $ripple;
    public $usdt;
    public $polygon;

    // Pass in the user model to the component via mount()
    public function mount($user)
    {
        $this->user = $user;

        // Retrieve crypto accounts from the associated account record
        $this->bitcoin  = $user->account->bitcoin_balance ?? 0 ;
        $this->ethereum = $user->account->ethereum_balance ?? 0 ;
        $this->solana   = $user->account->solana_balance ?? 0 ;
        $this->ripple   = $user->account->ripple_balance ?? 0 ;
        $this->usdt     = $user->account->usdt_balance ?? 0 ;
        $this->polygon  = $user->account->polygon_balance ?? 0 ;
    }

    public function updateCryptoAccounts()
    {
        $data = $this->validate([
            'bitcoin'  => 'nullable',
            'ethereum' => 'nullable',
            'solana'   => 'nullable',
            'ripple'   => 'nullable',
            'usdt'     => 'nullable',
            'polygon'  => 'nullable',
        ]);

        // Update the user's crypto accounts in the accounts table
        $this->user->account->update([
            'bitcoin_balance'  => $data['bitcoin'],
            'ethereum_balance' => $data['ethereum'],
            'solana_balance'   => $data['solana'],
            'ripple_balance'   => $data['ripple'],
            'usdt_balance'     => $data['usdt'],
            'polygon_balance'  => $data['polygon'],
        ]);

        return $this->dispatch('notify', type: 'success',message: 'User Crypto Balance Updated', );
    }

    public function render()
    {
        return view('livewire.admin.edit-user.edit-crypto-accounts');
    }
}
