<?php
namespace EmagGame\Config;

class Config implements ConfigInterface {

    const BATTLE_ROUNDS = 20;

    const HERO_STATS = [
        'health'    => [70, 100],
        'strength'  => [70, 80],
        'defence'   => [45, 55],
        'speed'     => [40, 50],
        'luck'      => [10, 30]
    ];
    const HERO_NAME = "Orderus";

    const BEAST_STATS = [
        'health'    => [60, 90],
        'strength'  => [60, 90],
        'defence'   => [40, 60],
        'speed'     => [40, 60],
        'luck'      => [25, 40]
    ];
    const BEAST_NAME = "Beast";
}
