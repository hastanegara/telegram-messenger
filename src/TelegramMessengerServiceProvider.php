<?php

namespace Hastanegara\TelegramMessenger;

use Illuminate\Support\ServiceProvider;

class TelegramMessengerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/telegram-messenger.php', 'telegram-messenger');
        $this->app->singleton('telegram-messenger', function () {
            return new TelegramMessenger();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/telegram-messenger.php' => config_path('telegram-messenger.php'),
        ], 'config');
    }
}
