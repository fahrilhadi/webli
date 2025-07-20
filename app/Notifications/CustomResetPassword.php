<?php

// app/Notifications/CustomResetPassword.php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class CustomResetPassword extends ResetPassword
{
    public function toMail($notifiable)
    {
        $frontendUrl = url('/'); // Misalnya homepage frontend

        return (new MailMessage)
            ->subject('Reset Your Password')
            ->line('You are receiving this email because we received a password reset request.')
            ->action('Reset Password', "{$frontendUrl}?reset_token={$this->token}")
            ->line('This link will expire in 60 minutes.')
            ->line('If you did not request a reset, no further action is required.');
    }
}