<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\AdminWallet;
use Illuminate\Support\Facades\Auth;

class AdminWalletAddresses extends Component
{
    public $admin_wallets;
    public $bitcoin;
    public $ethereum;
    public $solana;
    public $ripple;
    public $usdt;
    public $polygon;

    public function mount()
    {
        $this->admin_wallets = AdminWallet::first();

        // Retrieve crypto address of admin
        $this->bitcoin  = $this->admin_wallets->bitcoin_address ?? 'no address';
        $this->ethereum = $this->admin_wallets->ethereum_address ?? 'no address';
        $this->solana   = $this->admin_wallets->solana_address ?? 'no address';
        $this->ripple   = $this->admin_wallets->ripple_address ?? 'no address';
        $this->usdt     = $this->admin_wallets->usdt_address ?? 'no address';
        $this->polygon  = $this->admin_wallets->polygon_address ?? 'no address';
    }
    public function updateCryptoAddress()
    {
        $data = $this->validate([
            'bitcoin'  => 'nullable',
            'ethereum' => 'nullable',
            'solana'   => 'nullable',
            'ripple'   => 'nullable',
            'usdt'     => 'nullable',
            'polygon'  => 'nullable',
        ]);

        $admin_wallets = AdminWallet::first();

        if ($admin_wallets) {
            // Record exists: update it
            foreach (
                [
                    'bitcoin' => 'bitcoin_address',
                    'ethereum' => 'ethereum_address',
                    'solana' => 'solana_address',
                    'ripple' => 'ripple_address',
                    'usdt' => 'usdt_address',
                    'polygon' => 'polygon_address'
                ] as $field => $dbField
            ) {
                if (!is_null($data[$field]) && $admin_wallets->$dbField !== $data[$field]) {
                    $admin_wallets->$dbField = $data[$field];
                }
            }

            $admin_wallets->save();

            return $this->dispatch('notify',type: 'success',message: 'Admin Wallet Addresses Updated Successfully.');
        } else {
            // No record exists: insert new
            AdminWallet::create([
                "user_id"          => Auth::user()->id,
                'bitcoin_address'  => $data['bitcoin'],
                'ethereum_address' => $data['ethereum'],
                'solana_address'   => $data['solana'],
                'ripple_address'   => $data['ripple'],
                'usdt_address'     => $data['usdt'],
                'polygon_address'  => $data['polygon'],
            ]);

            return $this->dispatch('notify',type: 'success', message: 'Admin Wallet Addresses Created Successfully.');
        }
    }



    public function render()
    {
        return view('livewire.admin.admin-wallet-addresses');
    }
}
