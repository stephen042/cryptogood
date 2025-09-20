<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Mail\AppMail;
use App\Models\Account;
use Livewire\Component;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class Register extends Component
{
    public $name;
    public $email;
    public $country;
    public $password = '123';
    // public $password_confirmation;

    public function register()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'country' => 'required|string|max:255',
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'country' => $this->country,
            'password' => Hash::make($this->password),
        ]);

        // create accounts for the user
        $result = Account::create([
            'user_id' => $user->id,
            'solana_balance' => 0,
            'usdt_balance' => 0,
            'polygon_balance' => 0,
            'bitcoin_balance' => 0,
            'ethereum_balance' => 0,
            'ripple_balance' => 0,
        ]);

        if ($result) {
            $this->dispatch('notify', type: 'success', message: 'Your Callback Request was successful! Please wait for our Teams response.');

            $app = config('app.name');
            $userEmail = $validated['email'];

            $full_name = $validated['name'];
            $subject = "Callback Request Received";

            $bodyUser = [
                "name" => $full_name,
                "title" => "Callback Request",
                "message" => "Thank you for contacting $app! We’ve received your callback request, and our support team will reach out to you shortly. 
                We’re excited to assist you in getting started with secure and seamless digital asset management, and we look forward to helping you make the most of your journey.",
            ];

            $bodyAdmin = [
                "name" => "Admin",
                "title" => "New Callback Request",
                "message" => "Hello Admin, a new callback request has been submitted by $full_name on $app. Please reach out to the user at $userEmail to provide assistance.
                <br><br>
                <p>Users Details:</p>
                <ul>
                <li><strong>Email:</strong> $userEmail</li>
                </ul>
                ",
            ];

            try {
                // user email
                Mail::to($userEmail)->send(new AppMail($subject, $bodyUser));

                // Admin email
                Mail::to(config('app.Admin_email'))->send(new AppMail($subject, $bodyAdmin));
                $this->dispatch('reload-after-success');
            } catch (\Throwable $th) {
                //throw $th;
            }
        } else {
            return $this->dispatch('notify', type: 'error', message: 'Registration failed. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
