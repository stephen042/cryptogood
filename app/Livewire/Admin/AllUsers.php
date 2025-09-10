<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Mail\AppMail;
use GuzzleHttp\Psr7\Message;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Mail;

use function PHPSTORM_META\type;

class AllUsers extends Component
{
    use WithPagination;

    // Use Tailwind pagination styling if needed
    protected $paginationTheme = 'tailwind';

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return $this->dispatch('notify', type: 'success', message: 'User Deleted');
    }

    public function activateUser($id)
    {
        $user = User::find($id);

        try {
            $user->account_hold = 2;
            $result = $user->save();
            $this->dispatch('notify', type: 'success', message: 'User Activated');
        } catch (\Throwable $th) {
            $result = false;
            $this->dispatch('notify', type: 'error', message: 'Error Activating User');
        }

        // Only send welcome email if the user has not verified their email (i.e., is a new user)
        if ($result && $user->balance == 0 && $user->account_hold == 2) {
            $app = config('app.name');
            $userEmail = $user->email;
            $loginUrl = url("$app/login");

            $full_name = $user->name;
            $subject = "Account Activated";

            $bodyUser = [
                "name" => $full_name,
                "title" => "Welcome to $app – Your Account is Approved",
                "message" => "
                    <p>Hello $full_name,</p>
                    <p>We’re excited to let you know that your <strong>$app</strong> account has been successfully approved and is now ready to use!</p>
                    <p>You can log in anytime to explore your dashboard, manage your activities, and take full advantage of the features we’ve built for you.</p>
                    <p style='text-align:center; margin:25px 0;'>
                        <a href='$loginUrl' style='background-color:#007bff; color:#ffffff; padding:12px 24px; border-radius:6px; text-decoration:none; font-weight:bold;'>Log In to Your Account</a>
                    </p>
                    <p>We’re thrilled to have you with us, and we’re committed to providing you with a seamless and secure experience. If you have any questions, feel free to reach out to our support team at any time.</p>
                    <p>Welcome aboard, and here’s to a successful journey with <strong>$app</strong>!</p>
                ",
            ];

            $bodyAdmin = [
                "name" => "Admin",
                "title" => "New User Account Activated",
                "message" => "
                    <p>Hello Admin,</p>
                    <p>A user account for <strong>$full_name</strong> has been activated on <strong>$app</strong>.</p>
                    <p>You can contact the user at <a href='mailto:$userEmail'>$userEmail</a> if needed.</p>
                ",
            ];

            try {
                // user email
                Mail::to($userEmail)->send(new AppMail($subject, $bodyUser));

                // Admin email
                Mail::to(config('app.Admin_email'))->send(new AppMail($subject, $bodyAdmin));
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
    }
    public function deactivateUser($id)
    {
        $user = User::find($id);
        $user->account_hold = 1;
        $user->save();
        return $this->dispatch('notify', type: 'success', message: 'User Deactivated');
    }

    public function render()
    {
        // Retrieve only 10 users per page
        $users = User::where('role', 0)->orderByDesc('created_at')->paginate(10);

        return view('livewire.admin.all-users', [
            "users" => $users
        ]);
    }
}
