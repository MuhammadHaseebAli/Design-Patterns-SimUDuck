<?php
namespace App\SimUDuck;

class FlyNoWay implements FlyBehavior {
    public function fly() {
        echo 'I can\'t fly ' . PHP_EOL;
    }
}
