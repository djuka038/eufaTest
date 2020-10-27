<?php

namespace Src\Entities;

use Src\Exceptions\PlayerException;

class Player
{
    const POSITION_GOAL_KEEPER = 'goalKeeper';
    const POSITION_DEFENDER = 'defender';
    const POSITION_MID_FIELDER = 'midFielder';
    const POSITION_STRIKER = 'striker';

    private $position;
    private $quality;
    private $speed;
    private $injured = false;

    function __construct($position, $quality, $speed)
    {
        $this->position = $position;
        $this->quality = $quality;
        $this->speed = $speed;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function setPosition($position)
    {
        if (
            $position === self::POSITION_GOAL_KEEPER
            || $position === self::POSITION_DEFENDER
            || $position === self::POSITION_MID_FIELDER
            || $position === self::POSITION_STRIKER
        ) {
            $this->position = $position;
        } else {
            throw new PlayerException(1);
        }
    }

    public function getQuality()
    {
        return $this->quality;
    }

    public function setQuality($quality)
    {
        $this->quality = $quality;
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    public function getInjured()
    {
        return $this->injured;
    }

    public function setInjured($injured)
    {
        $this->injured = $injured;
    }
}
