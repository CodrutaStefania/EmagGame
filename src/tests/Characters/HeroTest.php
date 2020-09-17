<?php

namespace EmagGame\tests\Characters;
use EmagGame\Characters\Hero;
use EmagGame\Characters\RandomInitialization;
use PHPUnit\Framework\TestCase;

final class HeroTest extends TestCase
{

    public function testEmptyStatsArray()
    {
        $this->expectException("The stats cannot be empty!");
        $stats = [];
        $generator = new RandomInitialization();
        $hero = new Hero($generator, $stats);
        print_r($hero);

    }

    public function testMinimumOrMaximumIsMissing()
    {
        $this->expectException("Same values are missing!");

        $stats = [
            'health'    => [20],
            'strength'  => [70, 80],
            'speed'     => [40, 50],
            'defence'   => [],
            'luck'      => [10, 30]
        ];
        $generator = new RandomInitialization();
        $hero = new Hero($generator, $stats);
    }

    public function testMinimumIsGreaterThanMaximum()
    {
        $this->expectException("The minimum cannot be greater than maximum");

        $stats = [
            'health'    => [100, 70],
            'strength'  => [70, 80],
            'speed'     => [40, 50],
            'defence'   => [30, 50],
            'luck'      => [10, 30]
        ];
        $generator = new RandomInitialization();
        $hero = new Hero($generator, $stats);
    }

    public function testStatsValuesAreNotEmpty()
    {
        $stats = [
            'health'    => [70, 100],
            'strength'  => [50, 50],
            'speed'     => [40, 50],
            'defence'   => [30, 50],
            'luck'      => [10, 30]
        ];
        $generator = new RandomInitialization();
        $hero = new Hero($generator, $stats);

        $health = $hero->getHealth();
        $strength = $hero->getStrength();
        $speed = $hero->getSpeed();
        $defence = $hero->getDefence();
        $luck = $hero->getLuck();

        $this->assertNotEmpty($health);
        $this->assertNotEmpty($strength);
        $this->assertNotEmpty($speed);
        $this->assertNotEmpty($defence);
        $this->assertNotEmpty($luck);
    }

    public function testStatsValuesAreInRange()
    {
        $stats = [
            'health'    => [70, 100],
            'strength'  => [50, 50],
            'speed'     => [40, 50],
            'defence'   => [30, 50],
            'luck'      => [10, 30]
        ];
        $generator = new RandomInitialization();
        $hero = new Hero($generator, $stats);

        $health = $hero->getHealth();
        $this->assertTrue($health >= $stats['health'][0]);
        $this->assertTrue($health <= $stats['health'][1]);

        $strength = $hero->getStrength();
        $this->assertTrue($strength >= $stats['strength'][0]);
        $this->assertTrue($strength <= $stats['strength'][1]);

        $speed = $hero->getSpeed();
        $this->assertTrue($speed >= $stats['speed'][0]);
        $this->assertTrue($speed <= $stats['speed'][1]);

        $defence = $hero->getDefence();
        $this->assertTrue($defence >= $stats['defence'][0]);
        $this->assertTrue($defence <= $stats['defence'][1]);

        $luck = $hero->getLuck();
        $this->assertTrue($luck >= $stats['luck'][0]);
        $this->assertTrue($luck <= $stats['luck'][1]);
    }
}
