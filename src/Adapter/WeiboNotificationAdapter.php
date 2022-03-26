<?php

declare(strict_types=1);

namespace Linnzh\Utils\Adapter;

/**
 * @Adapter
 */
class WeiboNotificationAdapter implements NotificationTarget
{
    private WeiboApi $api;

    private string $chatUser;

    public function __construct(WeiboApi $api, string $chatUser)
    {
        $this->api = $api;
        $this->chatUser = $chatUser;
    }

    public function send(string $title, string $message): void
    {
        // 兼容适配 WeiboApi 的相关代码
        $this->api->login();
        $this->api->sendMessage($this->chatUser, $message);
    }
}
