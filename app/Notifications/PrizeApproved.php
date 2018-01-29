<?php

namespace App\Notifications;

use App\Models\Lottery;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PrizeApproved extends Notification implements ShouldQueue
{
    use Queueable;
    public $countyDraw;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Lottery $countyDraw)
    {
        $this->countyDraw = $countyDraw;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->markdown('mail.prize-approved', ['countyDraw' => $this->countyDraw]);
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
            //
        ];
    }
}
