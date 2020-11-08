<?php
namespace App\Components\QuackBehaviorDir;

use App\Components\QuackBehaviorDir\InterfaceNS\QuackBehavior;

class MuteQuack implements QuackBehavior {
    public function quack() {
        return '<< Silence >>';
    }
}
