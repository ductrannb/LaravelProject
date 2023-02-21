<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;
use Illuminate\Mail\Mailables\Address;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from:new Address('kiaisoft.duc.tran.laravel@gmail.com', 'Đức KiaiSoft'),
            subject:'Order Mail',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view:'order.view_order',
            with:[
                'first_name' => $this->order->first_name,
                'last_name' => $this->order->last_name,
                'company_name' => $this->order->company_name,
                'country' => $this->order->country,
                'address' => $this->order->address,
                'address2' => $this->order->address2,
                'town' => $this->order->town,
                'state' => $this->order->state,
                'zip' => $this->order->zip,
                'phone' => $this->order->phone,
                'email' => $this->order->email,
                'order_note' => $this->order->order_note,
                'cal_shipping' => $this->order->cal_shipping == 0 ? 'Flat rate' : ($this->order->cal_shipping == 1 ? 'Free shipping' : 'Local pickup'),
                'payment_method' => $this->order->payment_method == 0 ? 'Check payments' : 'Cash on delivery',
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
