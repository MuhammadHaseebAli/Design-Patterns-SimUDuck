<?php
namespace App\SimUDuck;

class Squeak implements QuackBehavior {
    public function quack() {
        echo 'Squeak' . PHP_EOL;
    }
}
