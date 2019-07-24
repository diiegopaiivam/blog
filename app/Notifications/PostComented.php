<?php

namespace App\Notifications;

use App\Models\Coment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PostComented extends Notification
{
    use Queueable;
    private $coment;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Coment $coment) 
    {
        $this->coment = $coment;
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
                    ->subject("Novo Comentário: {$this->coment->title}")
                    ->line($this->coment->body)
                    ->action('Ver o comentário', route('posts.show', $this->coment->post_id))
                    ->line('Abraços!');
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
