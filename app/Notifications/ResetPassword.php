<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword as Notification;

class ResetPassword extends Notification
{
  /**
   * Build the mail representation of the notification.
   *
   * @param mixed $notifiable
   *
   * @return MailMessage
   */
  public function toMail($notifiable): MailMessage
  {
    return (new MailMessage)
      ->subject(__('Password reset in the service ') . config('app.name'))
      ->greeting(__('Hello!'))
      ->line(__('You are receiving this email because we received a password reset request for your account.'))
      ->action(__('Reset Password'), url(config('app.url') . '/password/reset/' . $this->token) . '?email=' . urlencode($notifiable->email))
      ->line(__('If you did not request a password reset, no further action is required.'));
  }
}
