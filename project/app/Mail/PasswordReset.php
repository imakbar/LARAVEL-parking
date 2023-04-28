<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;
use App\Profile;
use Auth;
use App\UserPasswordReset;

class PasswordReset extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $User;
    public $PasswordReset;
    public function __construct(User $User, $PasswordReset)
    {
        $this->User = $User;
        $this->PasswordReset = $PasswordReset;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $User = $this->User;
        $PasswordReset = $this->PasswordReset;
        $profile = Profile::where('user_id', $User->id)->first();

        return $this->from('m.akbarsarwar@gmail.com')
                    ->subject('Password Reset')
                    ->view('email.password-reset')
        ->with([        
            'User'          => $User,
            'profile'       => $profile,
            'PasswordReset' => $PasswordReset,
        ]);
    }
}
