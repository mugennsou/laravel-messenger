<?php

namespace Mugennsou\LaravelMessenger\Facades;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Notification;
use Mugennsou\LaravelMessenger\SimpleMessageNotification;
use Overtrue\EasySms\Message;

class Messenger extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'messenger';
    }

    /**
     * Send message.
     * @param string $phone
     * @param null|string $templateCode
     * @param null|string $content
     * @param array $data
     * @param string $type
     */
    public static function sendSimpleMessage(string $phone, ?string $templateCode, ?string $content, array $data = [], string $type = MessageInterface::TEXT_MESSAGE)
    {
        SimpleMessageNotification::toMessengerUsing(function () use ($templateCode, $content, $data, $type) {
            return new Message([
                'template' => $templateCode,
                'content'  => $content,
                'data'     => $data
            ], $type);
        });

        Notification::route('messenger', $phone)
            ->notify(new SimpleMessageNotification());
    }

    /**
     * Send message now.
     * @param string $phone
     * @param null|string $templateCode
     * @param null|string $content
     * @param array $data
     * @param string $type
     */
    public static function sendSimpleMessageNow(string $phone, ?string $templateCode, ?string $content, array $data = [], string $type = MessageInterface::TEXT_MESSAGE)
    {
        SimpleMessageNotification::toMessengerUsing(function () use ($templateCode, $content, $data, $type) {
            return new Message([
                'template' => $templateCode,
                'content'  => $content,
                'data'     => $data
            ], $type);
        });

        Notification::route('messenger', $phone)
            ->notifyNow(new SimpleMessageNotification());
    }
}
