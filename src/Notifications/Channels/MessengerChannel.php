<?php

namespace Mugennsou\LaravelMessenger\Notifications\Channels;

use Illuminate\Notifications\Notifiable;
use Mugennsou\LaravelMessenger\MessengerException;
use Mugennsou\LaravelMessenger\Notifications\Contracts\AbstractMessageNotification;
use Overtrue\EasySms\EasySms;
use Overtrue\EasySms\Exceptions\Exception;

class MessengerChannel
{
    /**
     * @var EasySms
     */
    protected $messenger;

    public function __construct(EasySms $messenger)
    {
        $this->messenger = $messenger;
    }

    /**
     * @param Notifiable $notifiable
     * @param AbstractMessageNotification $notification
     * @throws MessengerException
     */
    public function send($notifiable, AbstractMessageNotification $notification)
    {
        $message = $notification->toMessenger($notifiable);

        if (!$phone = $notifiable->routeNotificationFor('messenger', $notification)) {
            return;
        }

        try {
            $this->messenger->send($phone, $message);
        } catch (Exception $exception) {
            throw new MessengerException($exception);
        }
    }
}
