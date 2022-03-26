<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\FactoryMethod\AbstractFactory;

use Linnzh\Utils\FactoryMethod\AbstractFactory\Application;
use Linnzh\Utils\FactoryMethod\AbstractFactory\WebFactory;
use Linnzh\Utils\FactoryMethod\AbstractFactory\WindowsFactory;
use PHPUnit\Framework\TestCase;

class GUIFactoryTest extends TestCase
{
    public function testExample(): void
    {
        $env = ['Windows', 'WEB', 'MacOS'];
        $config = $env[random_int(0, 2)];

        if ($config === 'Windows') {
            $factory = new WindowsFactory();
        } elseif ($config === 'WEB') {
            $factory = new WebFactory();
        } else {
            throw new \LogicException('不支持的操作系统！');
        }

        // $button = $factory->createButton();
        // $button->render();
        // $button->onClick();

        // $checkbox = $factory->createCheckbox();
        // $checkbox->print();

        // 无需关注具体的类
        $application = new Application($factory);
        $application->render();

        $this->assertEquals(true, true);
    }
}
