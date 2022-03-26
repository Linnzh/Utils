<?php

declare(strict_types=1);

namespace Linnzh\Utils\FactoryMethod;

interface Button
{
    public function render(): void;

    public function onClick(): void;
}
