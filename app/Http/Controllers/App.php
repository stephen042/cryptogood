<?php

namespace App\Http\Controllers;

use App\Models\AdminWallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class App extends Controller
{

    public function dashboard()
    {
        return view('app.dashboard',);
    }

    public function buy()
    {
        $admin_wallets = AdminWallet::first();
        return view('app.buy', [
            'admin_wallets' => $admin_wallets ?? 'No Wallet Found',
        ]);
    }
    public function send()
    {
        return view('app.send');
    }
    public function swap()
    {
        $user = Auth::user()->account;

        $balances = [
            'BTC'   => (float) ($user->bitcoin_balance ?? 0),
            'ETH'   => (float) ($user->ethereum_balance ?? 0),
            'SOL'   => (float) ($user->solana_balance ?? 0),
            'USDT'  => (float) ($user->usdt_balance ?? 0),
            'MATIC' => (float) ($user->polygon_balance ?? 0),
            'XRP'   => (float) ($user->ripple_balance ?? 0),
        ];

        $admin_wallets = AdminWallet::find(1);

        return view('app.swap', [
            'balances'        => $balances,
            'xrpWalletAddress' => $admin_wallets->ripple_address ?? '',
        ]);
    }

    public function trade(){

        return view('app.trade');
    }

    public function wallet(){

        return view('app.wallets');
    }
    public function track(){

        return view('app.track');
    }
}
