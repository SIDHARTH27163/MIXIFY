<?php
namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Messages\MailMessage;

class FollowRequestNotification extends Notification
{
    use Queueable;

    protected $follower;

    public function __construct(User $follower)
    {
        $this->follower = $follower;
    }

    public function via($notifiable)
    {
        return ['database', 'mail']; // Include mail channel
    }

    public function toDatabase($notifiable)
    {
        return new DatabaseMessage([
            'follower_id' => $this->follower->id,
            'follower_name' => $this->follower->name,
            'message' => $this->follower->name . ' wants to follow you.',
        ]);
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                ->subject('Follow Request')
                ->greeting('Hello ' . $notifiable->name . '!')
                ->line($this->follower->name . ' wants to follow you.')
                ->action('View Profile', url('/profile/' . $this->follower->id)) // Adjust URL as needed
                ->line('Click the button to view the request and respond.');
    }
}
