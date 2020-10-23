<?php
namespace App\SimUDuck;

class MuteQuack implements QuackBehavior {
    public function quack() {
        echo '<< Silence >>';
    }
}
