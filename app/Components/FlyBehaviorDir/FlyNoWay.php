<?php
namespace App\Components\FlyBehaviorDir;
// FLY FlyNoWay class implementinf  FlyBehavior

use App\Components\FlyBehaviorDir\InterfaceNS\FlyBehavior;

class FlyNoWay implements FlyBehavior {
    public function fly() {
        return  'I can\'t fly ';
    }
}
