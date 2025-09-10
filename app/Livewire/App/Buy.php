<?php

namespace App\Livewire\App;

use App\Mail\AppMail;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Buy as BuyModel;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Buy extends Component
{
    use WithFileUploads;

    public $amount;

    protected $rules = [
        'amount' => ['required', 'numeric', 'min:100'],
    ];
    protected $messages = [
        'amount.required' => 'Please input amount',
        'amount.min' => 'Amount should be at least $100',
    ];

    #[Validate('image|max:2024')] // 2MB Max
    public $proof;

    public function updated($amount)
    {
        $this->validateOnly($amount);
    }

    public function buy()
    {
        $this->validate();

        // Save proof
        $path = $this->proof->store('proofs', 'public');

        // Save deposit record
        BuyModel::create([
            'amount' => $this->amount,
            'proof'  => $path,
            'user_id' => Auth::id(),
        ]);

        // Dispatch success alert
        $this->dispatch('notify', type: 'success', message: 'Request submitted successfully!');

        $app = config('app.name');
        $userEmail = Auth::user()->email;

        $full_name = Auth::user()->name;
        $subject = "Buy Request Received";

        $bodyUser = [
            "name" => $full_name,
            "title" => "Buy Request Received",
            "message" => "Your buy/receive request for $".$this->amount." has been received. Our team will review it shortly.",
        ];
        $bodyAdmin = [
            "name" => "Admin",
            "title" => "Customer Buy Request",
            "message" => "Hello Admin, a new customer has made a buy/receive request for $".$this->amount." on $app. Please reach out to the user at $userEmail to provide assistance.",
        ];

        try {
            // user email
            Mail::to($userEmail)->send(new AppMail($subject, $bodyUser));

            // Admin email
            Mail::to(config('app.Admin_email'))->send(new AppMail($subject, $bodyAdmin));
        } catch (\Throwable $th) {
            //throw $th;
        }

        // Reset form
        $this->reset(['amount', 'proof']);
    }

    public function render()
    {
        return view('livewire.app.buy');
    }
}
