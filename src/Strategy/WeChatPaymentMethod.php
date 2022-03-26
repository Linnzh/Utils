<?php

declare(strict_types=1);

namespace Linnzh\Utils\Strategy;

/**
 * ConcreteStrategy
 */
class WeChatPaymentMethod implements PaymentMethodInterface
{
    public function pay(Order $order): void
    {
        echo "订单 {$order->id} 选择了 微信 作为支付方式\n";
        // Some Pay business logic
    }
}
