<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Mail\AppMail;
use Livewire\Component;
use GuzzleHttp\Psr7\Message;
use Livewire\WithPagination;
use function PHPSTORM_META\type;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
        } catch (\Throwable $th) {
            $result = false;
            $this->dispatch('notify', type: 'error', message: 'Error Activating User');
        }

        if ($result && Hash::check('12345678', $user->password) === false) {
            // This means the password is NOT the temporary one yet,
            // so this is the first activation → reset and send email
            $app = config('app.name');
            $userEmail = $user->email;
            $loginUrl = url("login");

            $full_name = $user->name;
            $subject = "Account Activated";

            // Reset password to temporary
            $temporaryPassword = '12345678';
            $user->password = bcrypt($temporaryPassword);
            $user->save();

            $bodyUser = [
                "name" => $full_name,
                "title" => "Your Account is Now Active",
                "message" => "
        <p>Hello $full_name,</p>
        <p>Your <strong>$app</strong> account is now active and ready to use.</p>
        <p><strong>Access Info:</strong></p>
        <ul>
            <li>Email: <span style='color:#007bff;'>$userEmail</span></li>
            <li>Temporary Password: <span style='color:#007bff;'>$temporaryPassword</span></li>
        </ul>
        <p>We recommend logging in and updating your password as soon as possible. For your protection, inactive accounts may be temporarily restricted after 24 hours if the password remains unchanged.</p>
        <p style='text-align:center; margin:20px 0;'>
            <a href='$loginUrl' style='background-color:#007bff; color:#ffffff; padding:10px 20px; border-radius:5px; text-decoration:none;'>Access Your Account</a>
        </p>
        <p>Welcome to <strong>$app</strong>. If you have any questions, our team is here to assist you.</p>
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
                // Send user email
                Mail::to($userEmail)->send(new AppMail($subject, $bodyUser));

                // Send admin email
                Mail::to(config('app.Admin_email'))->send(new AppMail($subject, $bodyAdmin));
            } catch (\Throwable $th) {
                // log error if needed
            }
        }
        $this->dispatch('notify', type: 'success', message: 'User Activated');
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
