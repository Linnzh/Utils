<?php

declare(strict_types=1);

namespace Linnzh\Utils\FactoryMethod\SocialNetwork;

class LinkedInPoster extends SocialNetworkPoster
{
    private string $email;

    private string $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function getSocialNetwork(): SocialNetworkConnector
    {
        return new LinkedInConnector($this->email, $this->password);
    }
}
