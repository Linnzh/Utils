<?php


namespace Linnzh\Utils\FactoryMethod;


class DialogFactory
{
    public static function createWindowsDialog(): WindowsDialog
    {
        return new WindowsDialog();
    }

    public static function createWebDialog(): WebDialog
    {
        return new WebDialog();
    }
}
