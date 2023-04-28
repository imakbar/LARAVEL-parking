<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\ParkingsTestimonial;
use App\Order;
use Auth;

class OrderReview extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $Order;
    public function __construct(Order $Order)
    {
        $this->Order = $Order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $Order = $this->Order;

        $Order = Order::find($Order->id);

        return $this->from('m.akbarsarwar@gmail.com')
                    ->subject( 'Rate Us' )
                    ->view('email.order-review')
        ->with([        
            'Order'     => $Order,
            'Testimonial' => ParkingsTestimonial::where('order_id', $Order->id)->first(),
        ]);
    }
}
