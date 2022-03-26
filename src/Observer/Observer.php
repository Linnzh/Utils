<?php

declare(strict_types=1);

namespace Linnzh\Utils\Observer;

abstract class Observer
{
    abstract public function update(Observable $observable, mixed $object);
}
