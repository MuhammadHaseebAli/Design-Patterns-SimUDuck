<?php
namespace App\SimUDuck;

class FlyRocketPowered implements FlyBehavior {
    public function fly() {
        echo 'flying rocket 🚀' . PHP_EOL;
    }
}