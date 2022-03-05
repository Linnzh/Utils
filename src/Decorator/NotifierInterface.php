<?php


namespace Linnzh\Utils\Decorator;


interface NotifierInterface
{
    public function send(string $message): void;
}
