<?php

namespace Mugennsou\LaravelMessenger;

use Overtrue\EasySms\Exceptions\Exception as EasySmsException;
use Overtrue\EasySms\Exceptions\NoGatewayAvailableException;

class MessengerException extends Exception
{
    /**
     * @var EasySmsException
     */
    protected $exception;

    /**
     * MessengerException constructor.
     *
     * @param EasySmsException $exception
     */
    public function __construct(EasySmsException $exception)
    {
        $this->exception = $exception;

        parent::__construct($this->makeMessage());
    }

    /**
     * Get raw exception.
     *
     * @return EasySmsException
     */
    public function getException(): EasySmsException
    {
        return $this->exception;
    }

    /**
     * Get raw exception message.
     *
     * @return string
     */
    protected function makeMessage(): string
    {
        if ($this->exception instanceof NoGatewayAvailableException) {
            $exceptions = $this->exception->getExceptions();

            $messages = collect($exceptions)->map(function (EasySmsException $exception, string $gateway) {
                return $gateway . ': ' . $exception->getMessage();
            })->toArray();

            return 'All the gateways have failed: [ ' . implode(',', $messages) . ' ]';
        }

        return $this->getException()->getMessage();
    }
}
