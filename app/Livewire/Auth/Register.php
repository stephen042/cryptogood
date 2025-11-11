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
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
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
            $this->dispatch('notify', type: 'success', message: 'Registeration was successfull.');

            $app = config('app.name');
            $userEmail = $validated['email'];

            $full_name = $validated['name'];
            $subject = "Welcome to $app";

            $bodyUser = [
                "name" => $full_name,
                "title" => "Welcome to $app",
                "message" => "
                    Hi $full_name,<br><br>

                    Welcome to <strong>$app</strong> — we're excited to have you join our community! 🎉<br><br>

                    Your account is now active, and you're ready to explore secure Web3 tools including:<br>
                    • Safe storage for your digital assets<br>
                    • Easy sending, receiving, and swapping<br>
                    • NFT management and activity tracking<br>
                    • Secure, private and encrypted wallet access<br><br>

                    If you ever need help, our support team is always available.<br><br>

                    <strong>Thank you for choosing $app — your trusted gateway to the Web3 world.</strong><br><br>

                    Best regards,<br>
                    The $app Team
                "
            ];


            $bodyAdmin = [
                "name" => "Admin",
                "title" => "New User Registration",
                "message" => "
                Hello Admin,<br><br>

                A new user has successfully registered on <strong>$app</strong>.<br>
                Please review their details and provide support if needed.<br><br>

                <strong>User Details:</strong><br>
                <ul>
                    <li><strong>Full Name:</strong> $full_name</li>
                    <li><strong>Email:</strong> $userEmail</li>
                </ul>

                Regards,<br>
                System Notification — $app
            "
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
