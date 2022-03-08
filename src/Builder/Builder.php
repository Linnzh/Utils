<?php


namespace Linnzh\Utils\Builder;


interface Builder
{
    public function setCarType(int $type): void;
    public function setSeatNum(int $seatNum): void;
    public function setEngine(Engine $engine): void;
    public function setGPSNavigator(GPSNavigator $navigator): void;
}
