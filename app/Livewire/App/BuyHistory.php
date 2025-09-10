<?php

namespace App\Livewire\App;

use App\Models\Buy;
use Livewire\Component;
use Livewire\WithPagination;

class BuyHistory extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $perPage = 5; // Default rows per page
    public function render()
    {
        $deposits = Buy::orderBy('created_at', 'desc')
            ->paginate($this->perPage);
        return view('livewire.app.buy-history',[
            'deposits' => $deposits,
        ]);
    }
}
