<?php

namespace App\Livewire\App;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class SendHistory extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';
    public $perPage = 5;

    public function render()
    {
        $withdraws = Auth::user()->sells()->orderBy('created_at', 'desc')->paginate(5);

        return view('livewire.app.send-history', [
            'withdraws' => $withdraws,
        ]);
    }
}

