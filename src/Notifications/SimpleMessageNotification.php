<?php

namespace Mugennsou\LaravelMessenger;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mugennsou\LaravelMessenger\Notifications\Contracts\AbstractMessageNotification;

class SimpleMessageNotification extends AbstractMessageNotification implements ShouldQueue
{
    use Queueable;
}
