<?php

namespace Hastanegara\TelegramMessenger;

use Illuminate\Support\Facades\Http;

class TelegramMessenger
{
    protected $config;

    public function __construct()
    {
        $this->config = config('telegram-messenger');
    }

    private function sendMessage($token, $chatId, $message)
    {
        $url = "https://api.telegram.org/bot{$token}/sendMessage";
        Http::post($url, [
            'chat_id' => $chatId,
            'text'    => $message,
        ]);
    }

    /** Send to Developer Channel */
    public function toDeveloper($message)
    {
        $this->sendMessage(
            $this->config['developer_bot_token'],
            $this->config['developer_chat_id'],
            "🚨 [BUG/ERROR]\n" . $message
        );
    }

    /** Send to Admin Channel */
    public function toAdmin($message)
    {
        $this->sendMessage(
            $this->config['admin_bot_token'],
            $this->config['admin_chat_id'],
            "📢 [EVENT]\n" . $message
        );
    }
}
