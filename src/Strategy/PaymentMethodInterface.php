<?php

declare(strict_types=1);

namespace Linnzh\Utils\Strategy;

/**
 * Strategy
 */
interface PaymentMethodInterface
{
    public function pay(Order $order): void;
}
