<?php
namespace EmagGame\Factory;
use EmagGame\Config\Config;
use EmagGame\Characters\RandomInitialization;
use EmagGame\Characters\Beast;

class BeastFactory implements CharacterFactory
{
    public static function create()
    {
        $beast = new Beast(new RandomInitialization, Config::BEAST_STATS);

        $beast->setName(Config::BEAST_NAME);

        return $beast;

    }
}