<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderNoti extends Notification
{
    use Queueable;

    private $order;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url(route('payment.ui', ['code'=>$this->order->id]));

        return (new MailMessage)
            ->greeting('Hello! ' . $this->order->last_name . ' ' . $this->order->first_name)
            ->line('One of your order has been paid!')
            ->lineIf($this->order->total_money > 0, "Amount paid: {$this->order->total_money}")
            ->action('View Invoice', $url)
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'order_id' => $this->order->id,
            'first_name' => $this->order->first_name,
            'last_name' => $this->order->last_name,
            'total_money' => $this->order->total_money,
        ];
    }
}
