<?php

namespace App\Livewire\App;


use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class TradeHistory extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        return view('livewire.app.trade-history', [
            'trades' => Auth::user()->trades()->orderBy('created_at', 'desc')->paginate(5),
        ]);
    }
}
