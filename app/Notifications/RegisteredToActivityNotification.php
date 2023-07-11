<?php

namespace App\Notifications;

use App\Models\Activity;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegisteredToActivityNotification extends Notification
{
    public function __construct(private readonly Activity $activity)
    {}

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('You have successfully registered')
            ->line('Thank you for registering to the activity ' . $this->activity->name)
            ->line('Start time ' . $this->activity->start_time);
    }

    public function toArray($notifiable): array
    {
        return [];
    }
}
