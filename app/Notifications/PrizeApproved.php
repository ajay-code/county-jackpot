<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Lottery;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PrizeApproved extends Notification implements ShouldQueue
{
    use Queueable;
    public $countyDraw;
    public $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Lottery $countyDraw, User $user)
    {
        $this->countyDraw = $countyDraw;
        $this->user = $user;
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
        return (new MailMessage)
            ->subject('Prize Approved')
            ->markdown('mail.prize-approved', ['countyDraw' => $this->countyDraw, 'user' => $this->user]);
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
