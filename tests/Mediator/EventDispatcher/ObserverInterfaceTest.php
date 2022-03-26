<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\Mediator\EventDispatcher;

use Linnzh\Utils\Mediator\EventDispatcher\EventDispatcher;
use Linnzh\Utils\Mediator\EventDispatcher\Logger;
use Linnzh\Utils\Mediator\EventDispatcher\OnBoardingNotification;
use Linnzh\Utils\Mediator\EventDispatcher\UserRepository;
use PHPUnit\Framework\TestCase;

class ObserverInterfaceTest extends TestCase
{
    public function testExample(): void
    {
        $eventDispatcher = EventDispatcher::getInstance();
        echo PHP_EOL;

        $repository = new UserRepository();
        $eventDispatcher->attach($repository, 'facebook:update');

        $logger = new Logger(__DIR__ . '/log.txt');
        $eventDispatcher->attach($logger, '*');

        $onBoarding = new OnBoardingNotification('test@example.com');
        $eventDispatcher->attach($onBoarding, 'users:created');

        $repository->initialize(__DIR__ . 'users.csv');

        $user = $repository->createUser([
            'name' => 'Linnzh',
            'email' => 'linnzh@example.com',
        ]);

        $user->delete();

        $this->assertEquals(true, true);
    }
}
