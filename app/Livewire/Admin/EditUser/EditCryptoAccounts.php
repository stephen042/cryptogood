<?php

namespace App\Livewire\Admin\EditUser;

use Livewire\Component;

class EditCryptoAccounts extends Component
{
    public $user;
    public $bitcoin, $ethereum, $solana, $ripple, $usdt, $polygon;
    public $busd, $usdc, $dai, $tusd;

    public function mount($user)
    {
        $this->user = $user;

        // Load balances from DB
        $this->bitcoin  = $user->account->bitcoin_balance ?? 0;
        $this->ethereum = $user->account->ethereum_balance ?? 0;
        $this->solana   = $user->account->solana_balance ?? 0;
        $this->ripple   = $user->account->ripple_balance ?? 0;
        $this->usdt     = $user->account->usdt_balance ?? 0;
        $this->polygon  = $user->account->polygon_balance ?? 0;
        $this->busd     = $user->account->busd_balance ?? 0;
        $this->usdc     = $user->account->usdc_balance ?? 0;
        $this->dai      = $user->account->dai_balance ?? 0;
        $this->tusd     = $user->account->tusd_balance ?? 0;
    }

    public function updateCryptoAccounts()
    {
        $data = $this->validate([
            'bitcoin'  => 'nullable|numeric',
            'ethereum' => 'nullable|numeric',
            'solana'   => 'nullable|numeric',
            'ripple'   => 'nullable|numeric',
            'usdt'     => 'nullable|numeric',
            'polygon'  => 'nullable|numeric',
            'busd'     => 'nullable|numeric',
            'usdc'     => 'nullable|numeric',
            'dai'      => 'nullable|numeric',
            'tusd'     => 'nullable|numeric',
        ]);

        // Update accounts table
        $this->user->account->update([
            'bitcoin_balance'  => $data['bitcoin'],
            'ethereum_balance' => $data['ethereum'],
            'solana_balance'   => $data['solana'],
            'ripple_balance'   => $data['ripple'],
            'usdt_balance'     => $data['usdt'],
            'polygon_balance'  => $data['polygon'],
            'busd_balance'     => $data['busd'],
            'usdc_balance'     => $data['usdc'],
            'dai_balance'      => $data['dai'],
            'tusd_balance'     => $data['tusd'],
        ]);

        return $this->dispatch(
            'notify',
            type: 'success',
            message: 'User Crypto Balance Updated'
        );
    }

    public function render()
    {
        return view('livewire.admin.edit-user.edit-crypto-accounts');
    }
}
