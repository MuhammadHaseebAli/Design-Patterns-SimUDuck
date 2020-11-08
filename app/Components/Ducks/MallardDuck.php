<?php
namespace App\Components\Ducks;

use App\Components\Ducks\AbstractClass\Duck;
use App\Components\FlyBehaviorDir\FlyWithWings;
use App\Components\QuackBehaviorDir\Quacks;

class MallardDuck extends Duck {

    public function __construct() {
        $this->quackBehavior = new Quacks();
        $this->flyBehavior = new FlyWithWings();
    }

    public function swim() {

    }

}