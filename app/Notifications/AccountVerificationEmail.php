<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AccountVerificationEmail extends Notification
{
    use Queueable;
    // public $name;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    
    public function __construct(/*$name*/)
    {
       // $this->name = $name;
        //
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
                    ->Subject('Account Verified!')
                    ->greeting('Hello,'/*,['name' => $this->name]*/)     
                    ->line('Thank you, your account is now active. Please use the link below to log in to your account!')
                    ->action('Go to home page', url('https://switfx.com'))
                    ->line('Thank you for using PayHelpa.');
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
