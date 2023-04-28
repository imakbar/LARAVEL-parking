<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Parking;
use App\Order;
use Auth;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $Order;
    public $Parking;
    public function __construct(Order $Order, Parking $Parking)
    {
        $this->Order = $Order;
        $this->Parking = $Parking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $Order = $this->Order;
        $Parking = $this->Parking;

        $Order = Order::find($Order->id);
        $Parking = Parking::find($Parking->id);

        return $this->from('m.akbarsarwar@gmail.com')
                    ->subject( 'Order Placed Successfully' )
                    ->view('email.user-order-confirmation')
        ->with([        
            'Order'     => $Order,
            'Parking'   => $Parking,
        ]);
    }
}
