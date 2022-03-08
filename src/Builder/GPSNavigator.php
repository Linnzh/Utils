<?php


namespace Linnzh\Utils\Builder;


class GPSNavigator
{
    public string $name = '北斗七星';

    public function __construct(?string $name)
    {
        $name && $this->name = $name;
    }
}
