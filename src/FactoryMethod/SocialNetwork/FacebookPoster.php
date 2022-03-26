<?php

declare(strict_types=1);

namespace Linnzh\Utils\FactoryMethod\SocialNetwork;

class FacebookPoster extends SocialNetworkPoster
{
    private string $password;

    private string $login;

    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function getSocialNetwork(): SocialNetworkConnector
    {
        return new FacebookConnector($this->login, $this->password);
    }
}
