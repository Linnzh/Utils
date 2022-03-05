<?php


namespace Linnzh\Utils\Observer;


abstract class Observer
{
    abstract public function update(Observable $observable, mixed $object);
}
