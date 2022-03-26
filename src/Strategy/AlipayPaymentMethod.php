<?php


namespace Linnzh\Utils\Strategy;


/**
 * ConcreteStrategy
 */
class AlipayPaymentMethod implements PaymentMethodInterface
{
    public function pay(Order $order): void
    {
        echo "订单 {$order->id} 选择了 支付宝 作为支付方式\n";
        // Some Pay business logic
    }
}
