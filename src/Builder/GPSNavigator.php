<?php

declare(strict_types=1);

namespace Linnzh\Utils\Builder;

class GPSNavigator
{
    public string $name = 'εζδΈζ';

    public function __construct(?string $name)
    {
        $name && $this->name = $name;
    }
}
