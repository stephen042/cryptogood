<?php

namespace App\Livewire\App;

use App\Models\Trade;
use Livewire\Component;
use Livewire\WithPagination;

class TradeHistory extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        return view('livewire.app.trade-history', [
            'trades' => Trade::orderBy('created_at', 'desc')->paginate(5),
        ]);
    }
}
