<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\FactoryMethod\SocialNetwork;

use Linnzh\Utils\FactoryMethod\SocialNetwork\SocialNetworkConnectorFactory;
use PHPUnit\Framework\TestCase;

class SocialNetworkConnectorFactoryTest extends TestCase
{
    public function testExample(): void
    {
        $socialNetworkConnector = SocialNetworkConnectorFactory::createFacebookConnector('facebook', 'facebook_pw');
        $socialNetworkConnector->logIn();
        $socialNetworkConnector->createPost('今天学习了工厂模式');
        $socialNetworkConnector->logOut();

        $socialNetworkConnector = SocialNetworkConnectorFactory::createLinkedInConnector('linkedin', 'linkedin_pw');
        $socialNetworkConnector->logIn();
        $socialNetworkConnector->createPost('今天学习了工厂模式噢');
        $socialNetworkConnector->logOut();

        $this->assertEquals(true, true);
    }
}
