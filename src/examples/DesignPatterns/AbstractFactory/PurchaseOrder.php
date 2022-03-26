<?php

declare(strict_types=1);

namespace Linnzh\Utils\examples\DesignPatterns\AbstractFactory;

class PurchaseOrder implements OrderInterface
{
    protected \DateTimeInterface $createAt;

    public function __construct(protected array $products = [])
    {
        $this->createAt = new \DateTimeImmutable();
    }

    public function calculateOrderAmount()
    {
        // Implement calculateOrderAmount() method.
        return array_sum(array_column($this->products, 'amount'));
    }
}
