<?php
namespace EmagGame;
use EmagGame\Factory\BattleFactory;
use EmagGame\Factory\HeroFactory;
use EmagGame\Factory\BeastFactory;

class App{
    public static function init()
    {   
        try{
            $hero  = HeroFactory::create();
            $beast = BeastFactory::create();

            $battle = BattleFactory::create($hero, $beast);
            $battle->startBattle();
        }
        catch(Exception $e)
        {
            print_r($e->getMessage());
        }
    }
}
