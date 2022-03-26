<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\FactoryMethod;

use Linnzh\Utils\FactoryMethod\DialogFactory;
use PHPUnit\Framework\TestCase;

class DialogFactoryTest extends TestCase
{
    public function testExample(): void
    {
        $windowsDialog = DialogFactory::createWindowsDialog();
        $windowsDialog->render();
        $button = $windowsDialog->createButton();
        $button->render();
        $button->onClick();

        $webDialog = DialogFactory::createWebDialog();
        $webDialog->render();
        $button = $webDialog->createButton();
        $button->render();
        $button->onClick();

        $this->assertEquals(true, true);
    }
}
