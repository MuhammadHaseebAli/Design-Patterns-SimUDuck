<?php
namespace App\SimUDuck;

class Quacks implements QuackBehavior {
    public function quack(){
        echo 'quack qrrrr '. PHP_EOL ;
    }
}