<?php

declare(strict_types=1);

namespace Linnzh\Utils\TemplateMethod;

class OrderFactory
{
    public static function createOrder(bool $isPickUp = false, array $attributes = [])
    {
        return !$isPickUp ? (new RegularOrder($attributes)) : (new PickupOrder($attributes));
    }
}
