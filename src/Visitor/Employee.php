<?php

declare(strict_types=1);

namespace Linnzh\Utils\Visitor;

class Employee implements Entity
{
    private string $name;

    private string $position;

    private float $salary;

    public function __construct(string $name, string $position, float $salary)
    {
        $this->name = $name;
        $this->position = $position;
        $this->salary = $salary;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }

    // ...

    public function accept(Visitor $visitor): string
    {
        return $visitor->visitEmployee($this);
    }
}
