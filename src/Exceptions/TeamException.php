<?php

namespace Src\Exceptions;

class TeamException extends \Exception implements \JsonSerializable
{
    public $var;

    const THROW_NONE = 0;
    const THROW_MAX_PLAYERS = 1;
    const THROW_MAX_GOAL_KEEPERS = 2;
    const THROW_MAX_DEFENDERS = 3;
    const THROW_MAX_MID_FIELDERS = 4;
    const THROW_MAX_STRIKERS = 5;

    function __construct($value = self::THROW_NONE)
    {
        switch ($value) {
            case self::THROW_MAX_PLAYERS:
                parent::__construct("You have max players", self::THROW_MAX_PLAYERS);
                break;

            case self::THROW_MAX_GOAL_KEEPERS:
                parent::__construct("You have max goal keepers", self::THROW_MAX_GOAL_KEEPERS);
                break;

            case self::THROW_MAX_DEFENDERS:
                parent::__construct("You have max defenders", self::THROW_MAX_DEFENDERS);
                break;

            case self::THROW_MAX_MID_FIELDERS:
                parent::__construct("You have max mid fielders", self::THROW_MAX_MID_FIELDERS);
                break;

            case self::THROW_MAX_STRIKERS:
                parent::__construct("You have max strikers", self::THROW_MAX_STRIKERS);
                break;

            default:
                $this->var = $value;
                break;
        }
    }

    public function jsonSerialize()
    {
        return [
            'message' => $this->getMessage(),
            'code' => $this->getCode(),
        ];
    }
}
