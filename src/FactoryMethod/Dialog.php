<?php


namespace Linnzh\Utils\FactoryMethod;


abstract class Dialog
{
    abstract public function render(): void;
    abstract public function createButton(): Button;
}
