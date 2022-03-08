<?php


namespace Linnzh\Utils\Builder;


/**
 * @Director 生成不同配置的实例，相当于一份配置清单
 */
class Director
{
    public function buildSportsCar(Builder $builder): void
    {
        $builder->setCarType(1);
        $builder->setSeatNum(4);
        $builder->setEngine(new Engine('里程：20000 km'));
        $builder->setGPSNavigator(new GPSNavigator('GPS'));
    }

    public function buildSUVCar(Builder $builder): void
    {
        $builder->setCarType(2);
        $builder->setSeatNum(8);
        $builder->setEngine(new Engine('里程：200000 km'));
        $builder->setGPSNavigator(new GPSNavigator('北斗七星'));
    }
}
