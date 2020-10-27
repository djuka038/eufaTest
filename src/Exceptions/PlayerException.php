<?php

namespace Src\Exceptions;

class PlayerException extends \Exception implements \JsonSerializable
{
    public $var;

    const THROW_NONE = 0;
    const THROW_WRONG_POSITION = 1;

    function __construct($value = self::THROW_NONE)
    {
        switch ($value) {
            case self::THROW_WRONG_POSITION:
                parent::__construct("You have chosen non existing position", self::THROW_WRONG_POSITION);
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
