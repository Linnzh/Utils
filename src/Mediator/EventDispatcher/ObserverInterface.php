<?php

declare(strict_types=1);

namespace Linnzh\Utils\Mediator\EventDispatcher;

interface ObserverInterface
{
    public function update(string $event, object $emitter, $data = null): void;
}
