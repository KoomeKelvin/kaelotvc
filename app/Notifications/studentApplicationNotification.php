<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class studentApplicationNotification extends Notification
{
    use Queueable;
    protected $password;
    protected $email;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($password, $email)
    {
        //
        $this->password=$password;
        $this->email=$email;
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
                    ->line('Kindly use the credentials below to log in to the student portal and dowload your Admission letter, Course requirements and Fees structure')
                    ->line('Username: '. $this->email)
                    ->line('Password: '.$this->password)
                    ->action('Click here to get to Kaelo T.V.C student portal', url('/student/login'))
                    ->line('Thank you!');
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
