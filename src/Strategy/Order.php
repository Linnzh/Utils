<?php

declare(strict_types=1);

namespace Linnzh\Utils\Strategy;

class Order
{
    public int $id;

    public \DateTime $createAt;

    public PaymentMethodInterface $paymentMethod;

    public function __construct(array $attributes = [])
    {
        $this->id = getmyuid();
        $this->createAt = new \DateTime();

        foreach ($attributes as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public function setPaymentMethod(PaymentMethodInterface $paymentMethod): void
    {
        $this->paymentMethod = $paymentMethod;
    }

    public function pay(): void
    {
        $this->paymentMethod->pay($this);
    }
}
