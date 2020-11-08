<?php
namespace App\Components\FlyBehaviorDir;
// FLY FlyRocketPowered class implementinf  FlyBehavior
use App\Components\FlyBehaviorDir\InterfaceNS\FlyBehavior;

class FlyRocketPowered implements FlyBehavior {
    public function fly() {
        return  'flying rocket 🚀';
    }
}