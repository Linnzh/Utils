<?php

declare(strict_types=1);

namespace Linnzh\Utils\Mediator\EventDispatcher;

/**
 * @Singleton
 */
class EventDispatcher
{
    /**
     * @var array
     */
    private array $observers = [];

    private static ?EventDispatcher $instance = null;

    private function __construct()
    {
        // The special event group for observers that want to listen to all
        // events.
        $this->observers['*'] = [];
    }

    public function __clone()
    {
        throw new \RuntimeException('禁止克隆一个单例对象！');
    }

    public function __wakeup()
    {
        throw new \RuntimeException('禁止序列化一个单例对象！');
    }

    public static function getInstance(): self
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function attach(ObserverInterface $observer, string $event = '*'): void
    {
        $this->initEventGroup($event);

        $this->observers[$event][] = $observer;
    }

    public function detach(ObserverInterface $observer, string $event = '*'): void
    {
        foreach ($this->getEventObservers($event) as $key => $s) {
            if ($s === $observer) {
                unset($this->observers[$event][$key]);
            }
        }
    }

    public function trigger(string $event, object $emitter, $data = null): void
    {
        echo "事件分发器——正在广播事件：{$event}\n";

        foreach ($this->getEventObservers($event) as $observer) {
            $observer->update($event, $emitter, $data);
        }
        echo PHP_EOL;
    }

    private function initEventGroup(string &$event = '*'): void
    {
        if (!isset($this->observers[$event])) {
            $this->observers[$event] = [];
        }
    }

    private function getEventObservers(string $event = '*'): array
    {
        $this->initEventGroup($event);
        $group = $this->observers[$event];
        $all = $this->observers['*'];

        return array_merge($group, $all);
    }
}
