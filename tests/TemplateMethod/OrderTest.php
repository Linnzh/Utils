<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\TemplateMethod;

use Linnzh\Utils\TemplateMethod\OrderFactory;
use Linnzh\Utils\TemplateMethod\PickupOrder;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function testExample(): void
    {
        $data = [
            'price' => 100.00,
            'products' => [
                [
                    'name' => '商品1',
                    'unit_price' => 30,
                    'quantity' => 3,
                    'pickup_quantity' => 1,
                ],
                [
                    'name' => '商品2',
                    'unit_price' => 70,
                    'quantity' => 2,
                    'pickup_quantity' => 0,
                ]
            ],
        ];

        $pickUp = false;

        foreach ($data['products'] as $product) {
            if (isset($product['pickup_quantity']) && $product['pickup_quantity'] > 0) {
                $pickUp = true;
                break;
            }
        }

        $order = OrderFactory::createOrder($pickUp, $data);
        $order->commit();

        $this->assertInstanceOf(PickupOrder::class, $order);
    }
}
