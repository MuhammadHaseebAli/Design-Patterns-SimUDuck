<?php
namespace App\Components\QuackBehaviorDir;

use App\Components\QuackBehaviorDir\InterfaceNS\QuackBehavior;

class Quacks implements QuackBehavior {
    public function quack(){
        return  'quack qrrrr '. PHP_EOL ;
    }
}