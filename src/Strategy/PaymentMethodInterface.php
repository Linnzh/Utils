<?php


namespace Linnzh\Utils\Strategy;


/**
 * Strategy
 */
interface PaymentMethodInterface
{
    public function pay(Order $order): void;
}
