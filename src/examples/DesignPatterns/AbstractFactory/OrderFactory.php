<?php


namespace Linnzh\Utils\examples\DesignPatterns\AbstractFactory;


class OrderFactory
{
    protected \DateTimeInterface $createAt;

    public function __construct(
        protected string $creator = '',
        protected string $customerName = '',
        protected string $text = ''
    )
    {
        $this->createAt = new \DateTimeImmutable();
    }

    public function createPurchaseOrder(array $details = []): PurchaseOrder
    {
        return new PurchaseOrder($details);
    }

    public function createSalesOrder(array $details = [], array $products = []): SalesOrder
    {
        return new SalesOrder($details, $products);
    }
}