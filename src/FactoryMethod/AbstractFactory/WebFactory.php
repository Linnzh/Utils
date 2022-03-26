<?php

declare(strict_types=1);

namespace Linnzh\Utils\FactoryMethod\AbstractFactory;

use Linnzh\Utils\FactoryMethod\Button;
use Linnzh\Utils\FactoryMethod\HTMLButton;

class WebFactory extends GUIFactory
{
    public function createButton(): Button
    {
        return new HTMLButton();
    }

    public function createCheckbox(): Checkbox
    {
        return new HTMLCheckbox();
    }
}
