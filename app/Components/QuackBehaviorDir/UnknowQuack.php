<?php
namespace App\Components\QuackBehaviorDir;

use App\Components\QuackBehaviorDir\InterfaceNS\QuackBehavior;

class UnknowQuack implements QuackBehavior {
    public function quack(){
        return  'ZZZZZ Unknown quack '. PHP_EOL ;
    }
}