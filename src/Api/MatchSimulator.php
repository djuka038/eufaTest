<?php

namespace Src\Api;

use Src\Entities\Game;
use Src\Entities\Team;
use Src\Entities\Player;

class MatchSimulator
{
    public function runMatch()
    {
        // This will run the match with random chosen events
    }

    private static function setFormation(Team $team)
    {
        // Sets formation according to the other team strength calculated by sum of players quality
    }

    private static function shoot()
    {
        // Event shoot at goal
    }

    private static function lowPass()
    {
        // Event low pass to nearest player
    }

    private static function loftedPass()
    {
        // Event lofted pass
    }

    private static function throughBall()
    {
        // Event ball in empty space
    }

    private static function penalty()
    {
        // Event penalty
    }

    private static function injure()
    {
        // Event injure
    }

    /**
     * Setups games with teams
     *
     * @return array
     */
    private static function setupGames()
    {
        $teams = self::setUpTeams();
        $games = [];

        do {
            $games[] = new Game(array_pop($teams), array_pop($teams));
        } while (count($teams) > 0);

        return $games;
    }

    /**
     * Setups teams with players
     *
     * @return array
     */
    private static function setUpTeams()
    {
        $teams = [
            new Team('team1'),
            new Team('team2'),
            new Team('team3'),
            new Team('team4'),
            new Team('team5'),
            new Team('team6'),
        ];

        foreach ($teams as $team) {
            $team->setPlayingFormation('regular');

            for ($i = 0; $i < $team::MAX_GOAL_KEEPERS; $i++) {
                $team->addPlayer(self::setUpPlayer(Player::POSITION_GOAL_KEEPER));
            }

            for ($i = 0; $i < $team::MAX_DEFENDERS; $i++) {
                $team->addPlayer(self::setUpPlayer(Player::POSITION_DEFENDER));
            }

            for ($i = 0; $i <  $team::MAX_MID_FIELDERS; $i++) {
                $team->addPlayer(self::setUpPlayer(Player::POSITION_MID_FIELDER));
            }

            for ($i = 0; $i < $team::MAX_STRIKERS; $i++) {
                $team->addPlayer(self::setUpPlayer(Player::POSITION_STRIKER));
            }
        }

        return $teams;
    }

    /**
     * Setups player
     *
     * @return Player
     */
    private static function setUpPlayer($position)
    {
        return new Player($position, rand(1, 100), rand(1, 100));
    }
}
