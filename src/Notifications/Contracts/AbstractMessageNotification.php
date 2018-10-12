<?php

namespace Mugennsou\LaravelMessenger\Notifications\Contracts;

use Closure;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Overtrue\EasySms\Contracts\MessageInterface;
use Overtrue\EasySms\Message;

abstract class AbstractMessageNotification extends Notification
{
    /**
     * The callback that should be used to build the messenger message.
     *
     * @var Closure|null
     */
    public static $toMessengerCallback;

    /**
     * Template code.
     * @var string
     */
    protected $templateCode;

    /**
     * Template content.
     * @var string
     */
    protected $content;

    /**
     * Template data.
     * @var array
     */
    protected $data;

    /**
     * Message type.
     * @see MessageInterface::TEXT_MESSAGE
     * @see MessageInterface::VOICE_MESSAGE
     * @var string
     */
    protected $type;

    /**
     * Set a callback that should be used when building the notification messenger message.
     *
     * @param  Closure $callback
     * @return void
     */
    public static function toMessengerUsing($callback): void
    {
        static::$toMessengerCallback = $callback;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return [
            'messenger',
        ];
    }

    /**
     * Build the messenger message representation of the notification.
     *
     * @param  Notifiable $notifiable
     * @return MessageInterface
     */
    public function toMessenger($notifiable): MessageInterface
    {
        if (static::$toMessengerCallback) {
            return call_user_func(static::$toMessengerCallback, $notifiable);
        }

        return (new Message())
            ->setTemplate($this->getTemplateCode())
            ->setContent($this->getContent())
            ->setData($this->getData())
            ->setType($this->getType());
    }

    /**
     * @return string
     */
    public function getTemplateCode(): ?string
    {
        return $this->templateCode;
    }

    /**
     * @param string $templateCode
     * @return AbstractMessageNotification
     */
    public function setTemplateCode(?string $templateCode): self
    {
        $this->templateCode = $templateCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return AbstractMessageNotification
     */
    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     * @return AbstractMessageNotification
     */
    public function setData(array $data = []): self
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return AbstractMessageNotification
     */
    public function setType(string $type = MessageInterface::TEXT_MESSAGE): self
    {
        $this->type = $type;

        return $this;
    }
}
