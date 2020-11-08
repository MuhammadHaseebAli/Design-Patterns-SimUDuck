<?php
namespace App\Components\Ducks;

use App\Components\Ducks\AbstractClass\Duck;
use App\Components\FlyBehaviorDir\FlyNoWay;
use App\Components\QuackBehaviorDir\MuteQuack;
use App\Components\QuackBehaviorDir\Quacks;

class WoddenDuck extends Duck {
    public function __construct() {
        $this->flyBehavior = new FlyNoWay();
        $this->quackBehavior = new MuteQuack();
    }

    public function swim()
    {

    }
}