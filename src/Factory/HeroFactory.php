<?php
namespace EmagGame\Factory;
use EmagGame\Config\Config;
use EmagGame\Characters\RandomInitialization;
use EmagGame\Characters\Hero;

class HeroFactory implements CharacterFactory
{
    public static function create()
    {
        $hero = new Hero(new RandomInitialization, Config::HERO_STATS);

        $hero->setName(Config::HERO_NAME);;

        return $hero;
    }
}