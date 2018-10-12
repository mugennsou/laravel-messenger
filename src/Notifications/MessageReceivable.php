<?php

namespace Mugennsou\LaravelMessenger;

interface MessageReceivable
{
    public function routeNotificationForMessenger(): string;
}
