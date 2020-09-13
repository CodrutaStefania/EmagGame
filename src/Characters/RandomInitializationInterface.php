<?php
namespace EmagGame\Characters;

interface RandomInitializationInterface {
    public function generate(Character $character, $stats = []);
}