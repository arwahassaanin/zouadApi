<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyEmailNotification extends Notification
{
    use Queueable;
    protected $verificationUrl;

    /**
     * Create a new notification instance.
     */
    public function __construct($verificationUrl)
    {
        //
        $this->verificationUrl = $verificationUrl;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('تأكيد البريد الإلكتروني')
            ->line('شكراً لتسجيلك! الرجاء الضغط على الرابط أدناه لتأكيد بريدك الإلكتروني.')
            ->action('تأكيد البريد الإلكتروني', $this->verificationUrl)
            ->line('إذا لم تقم أنت بهذا الطلب، لا حاجة لاتخاذ أي إجراء.');
    }
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
