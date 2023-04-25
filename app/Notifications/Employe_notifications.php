<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Employe_notifications extends Notification
{
    use Queueable;
    private $id_translate;
    private $name_user;
    private $name_translate;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($id_translate,$name_user,$name_translate)
    {
        //
        $this->id_translate = $id_translate;
        $this->name_user = $name_user;
        $this->name_translate = $name_translate;
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
            'id_translate'=>$this->id_translate,
            'name_user'=>$this->name_user,
            'name_translate'=>$this->name_translate,
        ];
    }
}
