<?php

declare(strict_types=1);

namespace Linnzh\Utils\Observer;

abstract class Observable
{
    /**
     * @var Observer[]
     */
    public array $observers = [];

    public function addObserver(Observer $observer): void
    {
        $this->observers[] = $observer;
    }

    public function removeObserver(Observer $removedObserver): void
    {
        foreach ($this->observers as $key => $observer) {
            if ($observer instanceof $removedObserver) {
                unset($this->observers[$key]);
                break;
            }
        }
    }

    public function notifyObservers(mixed $object): void
    {
        foreach ($this->observers as $key => $observer) {
            $observer->update($this, $object);
        }
    }
}
