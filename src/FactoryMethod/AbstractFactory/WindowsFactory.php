<?php


namespace Linnzh\Utils\FactoryMethod\AbstractFactory;


use Linnzh\Utils\FactoryMethod\Button;
use Linnzh\Utils\FactoryMethod\WindowsButton;

class WindowsFactory extends GUIFactory
{

    public function createButton(): Button
    {
        return new WindowsButton();
    }

    public function createCheckbox(): Checkbox
    {
        return new WindowsCheckbox();
    }
}
