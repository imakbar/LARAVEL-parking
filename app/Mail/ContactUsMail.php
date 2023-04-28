<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\ContactUsForm;
use Auth;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $ContactUsForm;
    public function __construct(ContactUsForm $ContactUsForm)
    {
        $this->ContactUsForm = $ContactUsForm;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $ContactUsForm = $this->ContactUsForm;
        $ContactUsForm = ContactUsForm::where('id', $ContactUsForm->id)->first();

        return $this->from('m.akbarsarwar@gmail.com')
                    ->subject( 'Contact Us' )
                    ->view('email.contact-us')
                    ->with([        
                        'ContactUs' => $ContactUsForm,
                    ]);
    }
}
