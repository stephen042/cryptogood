<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Sell;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalBalance = User::sum('balance');
        $totalEarnings = User::sum('earnings_balance');
        $totalWithdrawals = Sell::sum('amount');

        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalBalance' => $totalBalance,
            'totalEarnings' => $totalEarnings,
            'totalWithdrawals' => $totalWithdrawals
        ]);
    }

    public function adminWallets()
    {
        return view('admin.admin-wallets');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function editUser($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('admin.dashboard')->with('error', 'User not found.');
        }
        $user_balance = $user->balance;
        $userTotalEarnings = $user->earnings_balance;
        $userTotalSends = Sell::where('user_id', $user->id)->where("status", 3)->sum('amount');
        $userTotalBuys = Buy::where('user_id', $user->id)->where("status", 3)->sum('amount');
        return view('admin.edit-user', [
            'user' => $user,
            'user_balance' => $user_balance,
            'userTotalEarnings' => $userTotalEarnings,
            'userTotalSends' => $userTotalSends,
            'userTotalBuys' => $userTotalBuys
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
