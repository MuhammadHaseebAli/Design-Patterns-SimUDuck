<?php
namespace App\Components\FlyBehaviorDir;
// FLY FlyWithWings class implementing  FlyBehavior

use App\Components\FlyBehaviorDir\InterfaceNS\FlyBehavior;

class FlyWithWings implements FlyBehavior {
    public function fly() {
        return  'flying duck';
    }
}
