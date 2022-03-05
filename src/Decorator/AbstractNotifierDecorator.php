<?php


namespace Linnzh\Utils\Decorator;


abstract class AbstractNotifierDecorator implements NotifierInterface
{
    private ?NotifierInterface $wrapper;

    public function __construct(?NotifierInterface $notifier = null)
    {
        $this->wrapper = $notifier;
    }

    public function send(string $message): void
    {
        $this->wrapper && $this->wrapper->send($message);
    }
}
