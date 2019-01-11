<?php

namespace NotificationChannels\RayganSms;

use DomainException;
use Illuminate\Notifications\Notification;
use NotificationChannels\RayganSms\Events\MessageWasSent;
use NotificationChannels\RayganSms\Events\SendingMessage;
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
        if (!$this->shouldSendMessage($notifiable, $notification)) {
            return;
        }

        if (!$to = $notifiable->routeNotificationFor('raygansms')) {
            return;
        }

        $message = $notification->{'toRayganSms'}($notifiable);

        if (is_string($message)) {
            $message = new RayganSmsMessage($message);
        }

        try {
            RayganSms::sendMessage($to, $message->getContent());

            event(new MessageWasSent($notifiable, $notification));
        } catch (DomainException $e) {
            throw CouldNotSendNotification::serviceRespondedWithAnError($e);
        }
    }

    /**
     * Check if we can send the notification.
     *
     * @param $notifiable
     * @param Notification $notification
     *
     * @return bool
     */
    protected function shouldSendMessage($notifiable, Notification $notification)
    {
        return event(new SendingMessage($notifiable, $notification), [], true) !== false;
    }
}
