<?php

namespace App\Notifications;

use App\Models\UserLottery;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SuccessFullyEnteredDraw extends Notification
{
    use Queueable, SerializesModels;
    
    public $draw;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(UserLottery $draw)
    {
        $this->draw = $draw;
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
        $this->draw->load('lottery');
        return (new MailMessage)->markdown('mail.entered-draw', ['draw' => $this->draw]);
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
