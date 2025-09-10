<?php

namespace App\Livewire\App;

use App\Models\Sell;
use App\Mail\AppMail;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Send extends Component
{

    #[Validate('required|string')]
    public $crypto;

    public $amount;

    protected $rules = [
        'amount' => ['required', 'numeric', 'min:5000'],
    ];
    protected $messages = [
        'amount.required' => 'Please input amount',
        'amount.min' => 'Amount should be at least $5000',
    ];

    #[Validate('required|string')]
    public $walletAddress;

    public function updated($amount)
    {
        $this->validateOnly($amount);
    }

    public function send()
    {
        $this->validate();

        $user_id = Auth::user()->id;
        $account_balance = Auth::user()->earnings_balance;
        $full_name = Auth::user()->name;

        if ($this->amount > $account_balance) {
            $this->dispatch('notify', type: 'error', message: 'Insufficient balance');
            return;
        }

        $store = Sell::create([
            'user_id' => $user_id,
            'crypto_currency' => $this->crypto,
            'amount' => $this->amount,
            'wallet_address' => $this->walletAddress,
            'status' => 1,
        ]);

        if ($store) {
            // Deduct from user balance
            $new_balance = $account_balance - $this->amount;
            Auth::user()->update(['earnings_balance' => $new_balance]);
        
            $this->dispatch("notify", type: "success", message: "You have successfully initiated a transfer of $this->amount USD in $this->crypto.");

            $app = config('app.name');
            $userEmail = Auth::user()->email;

            $full_name = Auth::user()->name;
            $subject = "Send Request Received";

            $bodyUser = [
                "name" => $full_name,
                "title" => "Send Request Received",
                "message" => "Your send request for $$this->amount USD in $this->crypto has been received. Our team will review it shortly.",
            ];
            $bodyAdmin = [
                "name" => "Admin",
                "title" => "Customer Send Request",
                "message" => "Hello Admin, a new customer has made a send request for $$this->amount USD in $this->crypto on $app. Please reach out to the user at $userEmail to provide assistance.",
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
            $this->reset(['crypto', 'amount', 'walletAddress']);
        } else {
            $this->dispatch("notify", type: "error", message: 'An error occurred while processing your request. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.app.send');
    }
}
