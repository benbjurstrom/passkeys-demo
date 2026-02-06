<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SetupPasskeyNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public string $setupUrl,
        public string $subject = 'Set Up Your Passkey',
    ) {}

    /**
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject($this->subject)
            ->greeting("Hello {$notifiable->name}!")
            ->line('Click the button below to set up your passkey.')
            ->action('Set Up Passkey', $this->setupUrl)
            ->line('This link will expire in 60 minutes.')
            ->line('If you did not request this, no further action is required.');
    }
}
