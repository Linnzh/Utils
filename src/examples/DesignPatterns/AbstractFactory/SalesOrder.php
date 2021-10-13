<?php


namespace Linnzh\Utils\examples\DesignPatterns\AbstractFactory;


class SalesOrder implements OrderInterface
{
    protected \DateTimeInterface $createAt;

    public function __construct(
        protected array $details = [],
        protected array $products = []
    )
    {
        $this->createAt = new \DateTimeImmutable();
    }

    public function calculateOrderAmount()
    {
        // Implement calculateOrderAmount() method.
        return array_sum(array_column($this->products, 'amount'))
            + array_sum(array_column($this->details, 'amount'));
    }
}