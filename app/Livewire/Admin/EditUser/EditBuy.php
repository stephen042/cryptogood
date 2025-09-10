<?php

namespace App\Livewire\Admin\EditUser;

use App\Models\Buy;
use App\Mail\AppMail;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class EditBuy extends Component
{
    public $user;

    public function deleteDeposit($id)
    {
        $deposit = Buy::find($id);
        $deposit->delete();

        $this->dispatch('notify',type: 'success', message: 'Transaction Deleted Successfully', );
        return redirect()->route('admin.edit-user', $this->user->id);
    }

    public function approveDeposit($id)
    {
        $deposit = Buy::find($id);
        $deposit->status = 3;
        $deposit->save();


        // update user balance
        $user = $this->user;
        $user->balance += $deposit->amount;
        $user->save();


        // send email 
        $amount = $deposit->amount;
        $userEmail = $user->email;
        $full_name = $user->name;
        $subject = "Buy / Receive Approval Notification";

        $bodyUser = [
            "name" => $full_name,
            "title" => "Buy / Receive Approval",
            "message" => "Your Buy / Receive request of $$amount was approved successfully."
        ];
        $bodyAdmin = [
            "name" => "Admin",
            "title" => "Customer Buy / Receive Approval",
            "message" => "A user named $full_name Buy / Receive request of $$amount on have been approved on" . date('Y-M-d H:i') . "."
        ];

        try {
            // Send email
            Mail::to($userEmail)->send(new AppMail($subject, $bodyUser));
            Mail::to(config('app.Admin_email'))->send(new AppMail($subject, $bodyAdmin));

            $this->dispatch('notify',type: 'success', message: 'Transaction Approved Successfully');
            redirect()->route('admin.edit-user', $this->user->id);
        } catch (\Throwable $th) {
            $this->dispatch('notify', type: 'error', message: 'Email sending failed. Try again.');
        }
    }

    public function denyDeposit($id)
    {
        $deposit = Buy::find($id);
        $deposit->status = 2;
        $deposit->save();
        $user = $this->user;

        // send email 
        $amount = $deposit->amount;
        $userEmail = $user->email;
        $full_name = $user->name;
        $subject = "Buy / Receive Rejection Notification";

        $bodyUser = [
            "name" => $full_name,
            "title" => "Buy / Receive Rejection",
            "message" => "Your Buy / Receive request of $$amount was Rejection. Please contact support for more information."
        ];
        $bodyAdmin = [
            "name" => "Admin",
            "title" => "Customer Buy / Receive Rejection",
            "message" => "A user named $full_name Buy / Receive request of $$amount on have been Rejection on" . date('Y-M-d H:i') . "."
        ];

        try {
            // Send email
            Mail::to($userEmail)->send(new AppMail($subject, $bodyUser));
            Mail::to(config('app.Admin_email'))->send(new AppMail($subject, $bodyAdmin));

            $this->dispatch('notify',type: 'success', message: 'Transaction Denied Successfully');
            redirect()->route('admin.edit-user', $this->user->id);
        } catch (\Throwable $th) {
            $this->dispatch('notify', type: 'error', message: 'Email sending failed. Try again.' );
        }
    }
    public function render()
    {
        return view('livewire.admin.edit-user.edit-buy',[
            'deposits' => $this->user->buys()->orderByDesc('created_at')->paginate(10),
        ]);
    }
}
