<?php

declare(strict_types=1);

namespace Linnzh\Utils\ChainOfResponsibility;

/**
 * This Concrete Middleware checks whether a user associated with the request
 * has sufficient permissions.
 */
class RoleCheckMiddleware extends Middleware
{
    public function check(string $email, string $password): bool
    {
        if ($email === 'admin@example.com') {
            echo "RoleCheckMiddleware: Hello, 管理员！\n";

            return true;
        }
        echo "RoleCheckMiddleware: Hello, 普通用户！\n";

        return parent::check($email, $password);
    }
}
