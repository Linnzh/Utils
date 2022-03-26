<?php

declare(strict_types=1);

namespace Linnzh\Utils\State;

/**
 * @singleton
 */
class TCPEstablishedState extends TCPState
{
    private static ?self $instance = null;

    private function __construct()
    {
        // 构造函数私有化，使之无法被创建
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

    public function changeState(TCPConnectionContext $context, TCPState $state): void
    {
        $context->changeState($state);
    }

    public function behavior(TCPConnectionContext $context): string
    {
        return 'established';
    }
}
