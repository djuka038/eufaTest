<?php

namespace Src\Entities;

interface iFormation
{
    const FORMATION_DEFENSE = [
        'goalKeepers' => 1,
        'defenders' => 5,
        'midFielders' => 4,
        'strikers' => 1
    ];

    const FORMATION_REGULAR = [
        'goalKeepers' => 1,
        'defenders' => 4,
        'midFielders' => 4,
        'strikers' => 2
    ];

    const FORMATION_ATTACK = [
        'goalKeepers' => 1,
        'defenders' => 3,
        'midFielders' => 4,
        'strikers' => 3
    ];
}
