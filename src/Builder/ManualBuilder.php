<?php


namespace Linnzh\Utils\Builder;


class ManualBuilder implements Builder
{

    private int $catType;
    private int $seatNum;
    private Engine $engine;
    private GPSNavigator $navigator;

    public function __toString()
    {
        return "一份汽车手册，配置如下：\n类型：{$this->catType}\n座位数量：{$this->seatNum}\n发动机引擎：{$this->engine->name}\nGPS导航系统：{$this->navigator->name}";
    }

    public function setCarType(int $type): void
    {
        $this->catType = $type;
    }

    public function setSeatNum(int $seatNum): void
    {
        $this->seatNum = $seatNum;
    }

    public function setEngine(Engine $engine): void
    {
        $this->engine = $engine;
    }

    public function setGPSNavigator(GPSNavigator $navigator): void
    {
        $this->navigator = $navigator;
    }

    /**
     * @return int
     */
    public function getCatType(): int
    {
        return $this->catType;
    }

    /**
     * @return int
     */
    public function getSeatNum(): int
    {
        return $this->seatNum;
    }

    /**
     * @return Engine
     */
    public function getEngine(): Engine
    {
        return $this->engine;
    }

    /**
     * @return GPSNavigator
     */
    public function getNavigator(): GPSNavigator
    {
        return $this->navigator;
    }
}
