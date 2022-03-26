<?php

declare(strict_types=1);

namespace Linnzh\Utils\Adapter;

class WeiboApi
{
    private string $userName;

    private string $appKey;

    public function __construct(string $userName, string $appKey)
    {
        $this->userName = $userName;
        $this->appKey = $appKey;
    }

    public function login(): void
    {
        echo date('Y-m-d H:i:s') . "：用户 {$this->userName} 登录了微博！\n";
    }

    public function sendMessage(string $chatUser, string $message): void
    {
        echo date('Y-m-d H:i:s') . "：用户 {$this->userName} 向 {$chatUser} 发送了一条私信：{$message}\n";
    }

    /**
     * @return string
     */
    public function getAppKey(): string
    {
        return $this->appKey;
    }
}
