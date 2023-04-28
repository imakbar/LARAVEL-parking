<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;
use App\UserActivation;
use Auth;

class UserVerification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $User;
    public function __construct(User $User)
    {
        $this->User = $User;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $User = $this->User;
        $UserActivation = UserActivation::where('user_id', $User->id)->first();

        return $this->from('m.akbarsarwar@gmail.com')
                    ->subject( 'Account Confirmation. Please Verify Your Account' )
                    ->view('email.user-verification')
        ->with([        
            'User'          => $User,
            'Activation'    => $UserActivation,
        ]);
    }
}
