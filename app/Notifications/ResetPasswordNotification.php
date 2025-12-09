<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        // URL Reset Password (sesuaikan nama route)
        $url = route('password.reset', $this->token) . '?email=' . urlencode($notifiable->email);

        return (new MailMessage)
            ->subject('Reset Password - Indoteknik')
            ->view('emails.reset_password', ['url' => $url, 'user' => $notifiable]);
    }
}