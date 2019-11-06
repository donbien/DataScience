<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SignupActivate extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($save)
    {
    
  $this->studentdetails = $save;

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
        $url = url('/');
        return (new MailMessage)
            ->subject('Application of Non Ordinary Exams')
                // ->line('Date: '.$this->reservation->field_reservation_date)
            ->line($this->studentdetails->unit_name.' '.'will be offered from'.' '.$this->studentdetails->session_start. '-'.$this->studentdetails->session_end)
              ->line('Kindly make the application before the two weeks deadline expires ')
            ->action('Make Application', url($url))
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
