<?php


namespace Linnzh\Utils\FactoryMethod\AbstractFactory;


use Linnzh\Utils\FactoryMethod\Button;

class Application
{
    private Button $button;
    private Checkbox $checkbox;

    public function __construct(GUIFactory $factory)
    {
        $this->button = $factory->createButton();
        $this->checkbox = $factory->createCheckbox();
    }

    public function render(): void
    {
        $this->button->render();
        $this->checkbox->print();
    }
}
