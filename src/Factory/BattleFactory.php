<?php
namespace EmagGame\Factory;
use EmagGame\Logger\BattleLogger;
use EmagGame\Config\Config;
use EmagGame\Battle\Battle;
use EmagGame\Characters\Character;

class BattleFactory
{
    public static function create(Character $hero, Character $beast)
    {
        $battle = new Battle(new Config, new BattleLogger);

        $battle->initHero($hero)->initBeast($beast);

        return $battle;
    }
}