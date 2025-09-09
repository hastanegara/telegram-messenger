<?php

namespace Hastanegara\TelegramMessenger\Facades;

use Illuminate\Support\Facades\Facade;

class TelegramMessenger extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'telegram-messenger';
    }
}
