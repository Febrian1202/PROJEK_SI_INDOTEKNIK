<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LamaranMasukNotification extends Notification
{
    use Queueable;

    public $lamaran;

    /**
     * Create a new notification instance.
     */
    public function __construct($lamaran)
    {
        //
        $this->lamaran = $lamaran;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        // Data yang akan disimpan di JSON
        return [
            //
            'lamaran_id'=> $this->lamaran->id,
            'nama_pelamar'=> $this->lamaran->kandidat->nama_lengkap,
            'posisi' => $this->lamaran->posisi->nama_posisi,
            'waktu' => now(),
            'pesan'=> 'Lamaran baru masuk dari ' . $this->lamaran->kandidat->nama_lengkap
        ];
    }
}