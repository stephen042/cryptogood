<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Mail\AppMail;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function login()
    {
        $this->validate();

        $user = User::where('email', $this->email)->first();

        if ($user->account_hold == 1) {
            return $this->dispatch('notify', type: 'error', message: 'Your account is on hold. Please contact support.');
        }

        if (Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
        ], $this->remember)) {
            session()->regenerate();

            if ($user->role != 1) {
                redirect()->route('app.dashboard');
            } else {
                redirect()->route('admin.dashboard');
            }

            $app = config('app.name');
            $userEmail = $user->email;

            $full_name = $user->name;
            $subject = "Welcome to $app";

            $bodyUser = [
                "name" => $full_name,
                "title" => "Login Alert",
                "message" => "You have successfully logged in to your account. If this wasn't you, please reset your password immediately and contact support.",
            ];

            try {
                // user email
                Mail::to($userEmail)->send(new AppMail($subject, $bodyUser));
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        $this->addError('email', 'Invalid email or password.');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
