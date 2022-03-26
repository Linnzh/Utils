<?php

declare(strict_types=1);

namespace Linnzh\Utils\TemplateMethod;

class Product
{
    public string $name;

    public float $quantity;

    public float $pickupQuantity;

    public float $unitPrice;

    public \DateTime $createAt;

    public function __construct(array $attributes = [])
    {
        $this->createAt = new \DateTime();
        $this->name = $attributes['name'];
        $this->quantity = $attributes['quantity'];
        $this->pickupQuantity = $attributes['pickup_quantity'] ?? 0;
        $this->unitPrice = $attributes['unit_price'];
        unset($attributes['name'], $attributes['pickup_quantity'], $attributes['quantity'], $attributes['unit_price']);

        foreach ($attributes as $key => $value) {
            $this->{$key} = $value;
        }
    }
}
