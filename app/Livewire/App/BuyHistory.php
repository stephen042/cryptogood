<?php

namespace App\Livewire\App;

use App\Models\Buy;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class BuyHistory extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $perPage = 5; // Default rows per page
    public function render()
    {
        $deposits = Auth::user()->buys()->orderBy('created_at', 'desc')->paginate(5);
        return view('livewire.app.buy-history',[
            'deposits' => $deposits,
        ]);
    }
}
