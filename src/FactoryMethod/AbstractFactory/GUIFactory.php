<?php

declare(strict_types=1);

namespace Linnzh\Utils\FactoryMethod\AbstractFactory;

use Linnzh\Utils\FactoryMethod\Button;

abstract class GUIFactory
{
    abstract public function createButton(): Button;

    abstract public function createCheckbox(): Checkbox;
}
