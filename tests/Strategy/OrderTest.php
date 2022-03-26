<?php

namespace Linnzh\Utils\Test\Strategy;

use Linnzh\Utils\Strategy\Order;
use Linnzh\Utils\Strategy\PaymentFactory;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function testExample(): void
    {
        $order = new Order([
            'price' => 100.00,
            'products' => [
                [
                    'name' => '商品1',
                    'price' => 30,
                    'quantity' => 3
                ],
                [
                    'name' => '商品2',
                    'price' => 70,
                    'quantity' => 2
                ]
            ],
        ]);
        $order->setPaymentMethod(PaymentFactory::getPaymentMethod('alipay'));
        $order->pay();
        $this->assertTrue(true, true);
    }
}
