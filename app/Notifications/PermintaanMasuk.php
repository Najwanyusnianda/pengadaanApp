<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;



class PermintaanMasuk extends Notification
{
    use Queueable;

    protected $permintaan;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($permintaan)
    {
        //
        $this->permintaan=$permintaan;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        
        return [
            //
            'repliedTime'=>\Carbon\Carbon::now(),
            'bagian'=>auth()->user()->sub_bagian->nama_bagian,
            'permintaan'=>$this->permintaan,
            'user'=>$notifiable
        ];
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
