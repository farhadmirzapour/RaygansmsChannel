<?php

namespace NotificationChannels\RayganSms;

use DomainException;
use Illuminate\Notifications\Notification;
use NotificationChannels\RayganSms\Exceptions\CouldNotSendNotification;
use Trez\RayganSms\Facades\RayganSms;

class RayganSmsChannel
{
    public function __construct()
    {
    }

    /**
     * Send the given notification.
     *
     * @param mixed        $notifiable
     * @param Notification $notification
     *
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        if (!$to = $notifiable->routeNotificationFor('raygansms')) {
            return;
        }

        $message = $notification->{'toRayganSms'}($notifiable);
        try {
            if ($message->type == 'txt') {
                RayganSms::sendMessage($to, $message->content);
            } else {
                RayganSms::sendAuthCode($to, $message->content, $message->autoGenerate);
            }
        } catch (DomainException $e) {
            throw CouldNotSendNotification::serviceRespondedWithAnError($e);
        }
    }
}
