<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\ChainOfResponsibility;

use Linnzh\Utils\ChainOfResponsibility\RoleCheckMiddleware;
use Linnzh\Utils\ChainOfResponsibility\Server;
use Linnzh\Utils\ChainOfResponsibility\ThrottlingMiddleware;
use Linnzh\Utils\ChainOfResponsibility\UserExistsMiddleware;
use PHPUnit\Framework\TestCase;

class MiddlewareTest extends TestCase
{
    public function testExample(): void
    {
        $server = new Server();
        $server->register('admin@example.com', 'admin_pass');
        $server->register('user@example.com', 'user_pass');

        $middleware = new ThrottlingMiddleware(2);
        $middleware
            ->linkWith(new UserExistsMiddleware($server))
            ->linkWith(new RoleCheckMiddleware());

        $server->setMiddleware($middleware);


        $success = $server->logIn('123', '123_pass');
        $this->assertFalse($success);

        $success = $server->logIn('1234', '1234_pass');
        $this->assertFalse($success);

        $server->logIn('user@example.com', 'user_pass');

        $success = $server->logIn('admin@example.com', 'admin_pass');
        $this->assertTrue($success);
    }
}
