<?php

namespace Src\Entities;

use Src\Entities\Player;
use Src\Exceptions\TeamException;
use Src\Entities\iFormation;

class Team implements iFormation
{
    const MAX_PLAYERS = 22;
    const MAX_GOAL_KEEPERS = 2;
    const MAX_DEFENDERS = 6;
    const MAX_MID_FIELDERS = 10;
    const MAX_STRIKERS = 4;

    private $name;
    private $players = [
        'goalKeepers' => [],
        'defenders' => [],
        'midFielders' => [],
        'strikers' => [],
    ];
    private $playingFormation = [];

    function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPlayers()
    {
        return $this->players;
    }

    public function addPlayer(Player $player)
    {
        if ($this->countPlayers() >= self::MAX_PLAYERS) {
            throw new TeamException(1);
        }

        if (
            $player->position ===  Player::POSITION_GOAL_KEEPER
            && $this->countGoalKeepers() >= self::MAX_GOAL_KEEPERS
        ) {
            throw new TeamException(2);
        }

        if (
            $player->position ===  Player::POSITION_DEFENDER
            && $this->countDefenders() >= self::MAX_DEFENDERS
        ) {
            throw new TeamException(3);
        }

        if (
            $player->position ===  Player::POSITION_MID_FIELDER
            && $this->countMidFielders() >= self::MAX_MID_FIELDERS
        ) {
            throw new TeamException(4);
        }

        if (
            $player->position === Player::POSITION_STRIKER
            && $this->countStrikers() >= self::MAX_STRIKERS
        ) {
            throw new TeamException(5);
        }

        $position = $player->position . "s";
        $this->players[$position] = $player;
    }

    private function countPlayers()
    {
        $count = 0;
        foreach ($this->players as $playersOfPosition) {
            $count += count($playersOfPosition);
        }
        return $count;
    }

    private function countGoalKeepers()
    {
        return count($this->players['goalKeepers']);
    }

    private function countDefenders()
    {
        return count($this->players['defenders']);
    }

    private function countMidFielders()
    {
        return count($this->players['midFielders']);
    }

    private function countStrikers()
    {
        return count($this->players['strikers']);
    }

    public function getFormation()
    {
        return $this->formation;
    }

    public function getPlayingFormation()
    {
        return $this->playingFormation;
    }

    public function setPlayingFormation($formationName)
    {
        $formation = null;
        if ($formationName === 'defense') {
            $formation = self::FORMATION_DEFENSE;
        }

        if ($formationName === 'regular') {
            $formation = self::FORMATION_REGULAR;
        }

        if ($formationName === 'attack') {
            $formation = self::FORMATION_ATTACK;
        }

        $this->playingFormation['goalKeepers'] = $this->randomChosePlayer('goalKeepers', $formation['goalKeepers']);
        $this->playingFormation['defenders'] = $this->randomChosePlayer('defenders', $formation['defenders']);
        $this->playingFormation['midFielders'] = $this->randomChosePlayer('midFielders', $formation['midFielders']);
        $this->playingFormation['strikers'] = $this->randomChosePlayer('strikers', $formation['strikers']);
    }

    private function randomChosePlayer($position, $limit)
    {
        return array_rand($this->players[$position], $limit);
    }
}
