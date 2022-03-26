<?php

declare(strict_types=1);

namespace Linnzh\Utils\FactoryMethod\SocialNetwork;

class LinkedInConnector implements SocialNetworkConnector
{
    private string $password;

    private string $email;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function logIn(): void
    {
        echo "LinkedIn 登录 API: 用户：{$this->email} 密码：{$this->password}\n";
    }

    public function logOut(): void
    {
        echo "LinkedIn 注销 API: 用户：{$this->email} 密码：{$this->password}\n";
    }

    public function createPost($content): void
    {
        echo "LinkedIn 发帖 API: 内容：{$content}\n";
    }
}
