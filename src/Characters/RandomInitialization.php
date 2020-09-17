<?php
namespace EmagGame\Characters;
use Exception;

class RandomInitialization implements RandomInitializationInterface {

    public function generate(Character $character, $stats = []) {

        if(empty($stats))
        {
            throw new \Exception('The stats cannot be empty');
        }

        foreach($stats as $key => $value)
        {
            if(empty($value[0]) || empty($value[1]))
            {
                throw new \Exception('Same values are missing!');
            }

            $randNumber = $this->getRandomNumber($value[0], $value[1]);

            switch ($key) {
                case 'health':
                    $character->setHealth($randNumber);
                    break;
                case 'strength':
                    $character->setStrength($randNumber);
                    break;
                case 'defence':
                    $character->setDefence($randNumber);
                    break;
                case 'speed':
                    $character->setSpeed($randNumber);
                    break;
                case 'luck':
                    $character->setLuck($randNumber);
                    break;
                default :
                    throw new \Exception('Method not found');

            }
        }
    }

    public function getRandomNumber(int $min, int $max): int
    {
        return mt_rand($min, $max);
    }
}