<?php

namespace Src\Entities;

use Src\Entities\Team;

class Game
{
    private $homeTeam;
    private $awayTeam;

    function __construct(Team $homeTeam, Team $awayTeam) {
        $this->homeTeam = $homeTeam;
        $this->awayTeam = $awayTeam;
    }

    public function getHomeTeam() {
        return $this->homeTeam;
    }

    public function addTeamHome(Team $homeTeam)
    {
        $this->homeTeam = $homeTeam;
    }

    public function getAwayTeam() {
        return $this->awayTeam;
    }

    public function addTeamAway(Team $awayTeam)
    {
        $this->awayTeam = $awayTeam;
    }
}
