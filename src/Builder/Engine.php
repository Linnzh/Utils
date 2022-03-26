<?php

declare(strict_types=1);

namespace Linnzh\Utils\Builder;

class Engine
{
    public string $name = '里程：1000 km';

    public function __construct(?string $name)
    {
        $name && $this->name = $name;
    }
}
