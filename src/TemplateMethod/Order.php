<?php

declare(strict_types=1);

namespace Linnzh\Utils\TemplateMethod;

abstract class Order
{
    public int $id;

    public \DateTime $createAt;

    public int $type = 1;

    public array $products = [];

    public float $price = 0;

    public function __construct(array $attributes = [])
    {
        $this->id = getmyuid();
        $this->createAt = new \DateTime();

        foreach ($attributes as $key => $value) {
            if ($key === 'products') {
                foreach ($value as $item) {
                    $this->addProduct(new Product($item));
                }

                continue;
            }
            $this->{$key} = $value;
        }
    }

    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
        $this->price += $product->unitPrice * $product->quantity;
    }

    public function commit(): void
    {
        echo "\n订单正在提交……\n";
        echo "\n正在请求调度中心生成发货单……\n";
        echo "\n订单已完成！\n";
    }
}
