<?php

namespace App\Livewire\App;

use App\Models\Sell;
use Livewire\Component;
use Livewire\WithPagination;

class SendHistory extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';
    public $perPage = 5;

    public function render()
    {
        $withdraws = Sell::orderBy('created_at', 'desc')->paginate(5);

        return view('livewire.app.send-history', [
            'withdraws' => $withdraws,
        ]);
    }
}

