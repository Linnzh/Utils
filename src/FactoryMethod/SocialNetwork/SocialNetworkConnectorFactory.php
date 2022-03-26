<?php

declare(strict_types=1);

namespace Linnzh\Utils\FactoryMethod\SocialNetwork;

class SocialNetworkConnectorFactory
{
    public static function createFacebookConnector(string $login, string $password): FacebookConnector
    {
        return new FacebookConnector($login, $password);
    }

    public static function createLinkedInConnector(string $email, string $password): LinkedInConnector
    {
        return new LinkedInConnector($email, $password);
    }
}
