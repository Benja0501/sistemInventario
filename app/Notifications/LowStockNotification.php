<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LowStockNotification extends Notification
{
    use Queueable;

    protected $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'product_id'    => $this->product->id,
            'product_name'  => $this->product->name,
            'current_stock' => $this->product->current_stock,
            'min_stock'     => $this->product->min_stock,
            'message'       => "El producto {$this->product->name} está por debajo de stock mínimo.",
        ];
    }
    
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
