<?php
namespace App\Components\QuackBehaviorDir;

use App\Components\QuackBehaviorDir\InterfaceNS\QuackBehavior;

class Squeak implements QuackBehavior {
    public function quack() {
        return  'Squeak' . PHP_EOL;
    }
}
