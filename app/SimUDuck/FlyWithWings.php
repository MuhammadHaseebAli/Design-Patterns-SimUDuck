<?php
namespace App\SimUDuck;

class FlyWithWings implements FlyBehavior {
    public function fly() {
        echo 'flying duck' . PHP_EOL;
    }
}
