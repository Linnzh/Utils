<?php


namespace Linnzh\Utils\FactoryMethod\SocialNetwork;


class FacebookConnector implements SocialNetworkConnector
{
    private string $password;
    private string $login;

    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function logIn(): void
    {
        echo "Facebook 登录 API: 用户：{$this->login} 密码：{$this->password}\n";
    }

    public function logOut(): void
    {
        echo "Facebook 注销 API: 用户：{$this->login} 密码：{$this->password}\n";
    }

    public function createPost($content): void
    {
        echo "Facebook 发帖 API: 内容：{$content}\n";
    }
}
