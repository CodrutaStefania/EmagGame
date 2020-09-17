<?php
namespace EmagGame\Logger;
use EmagGame\Battle\BattleInterface;
use EmagGame\Config\Config;

class BattleLogger implements LoggerInterface {

    public function printInitialStats(BattleInterface $battle)
    {
        echo "Start Battle!"."</br></br>";
        echo "Hero health: ".$battle->getHero()->getHealth()."</br>";
        echo "Hero strength: ".$battle->getHero()->getStrength()."</br>";
        echo "Hero defence: ".$battle->getHero()->getDefence()."</br>";
        echo "Hero speed: ".$battle->getHero()->getSpeed()."</br>";
        echo "Hero luck: ".$battle->getHero()->getLuck()."</br>";
        echo "</br>";

        echo "Beast health: ".$battle->getBeast()->getHealth()."</br>";
        echo "Beast strength: ".$battle->getBeast()->getStrength()."</br>";
        echo "Beast defence: ".$battle->getBeast()->getDefence()."</br>";
        echo "Beast speed: ".$battle->getBeast()->getSpeed()."</br>";
        echo "Beast luck: ".$battle->getBeast()->getLuck()."</br>";
        echo "</br>";
    }

    public function printRoundStats(BattleInterface $battle, $currentRound)
    {
        echo "ROUND: ".$currentRound."</br></br>";
        echo "Attacker: ".$battle->getAttacker()->getName()."</br>";
        echo "Defender: ".$battle->getDefender()->getName()."</br>";
        echo "Attacker Health: ".$battle->getAttacker()->getHealth()."</br>";
        echo "Attacker Damage: ".$battle->getDamage()."</br>";

        if($battle->getHeroHasRapidStrike() === true)
        {
            echo Config::HERO_NAME." used rapid strike, double damage for defender.</br>";
            echo "Attacker new damage: ".($battle->getDamage()*2)."</br>";
        }

        if($battle->getDefenderWasLucky() === true)
        {
            echo "Defender was lucky, no damage.</br>";
            echo "Attacker new damage: 0.</br>";
        } else
        {
            if($battle->getHeroHasMagicShield() === true)
            {
                echo  Config::HERO_NAME." used magic shield, half damage for him.</br>";
                echo "Attacker new damage: ".($battle->getDamage()/2)."</br>";
            }
        }

        echo "Defender Health after attack: ".$battle->getDefender()->getHealth()."</br>";
        echo "</br>";


    }

    public function printBattleResults(BattleInterface $battle)
    {
        echo "GAME OVER!!</br>";
        echo "Winner is: ".$battle->getWinner()->getName();
    }
}