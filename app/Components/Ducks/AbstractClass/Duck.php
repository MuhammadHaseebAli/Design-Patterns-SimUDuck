<?php

namespace App\Components\Ducks\AbstractClass;

use App\Components\FlyBehaviorDir\InterfaceNS\FlyBehavior;
use App\Components\QuackBehaviorDir\InterfaceNS\QuackBehavior;

abstract class Duck
{

    /**
     * Instance variables hold a reference to a specific behavior at runtime
     *
     * @var [type]
     */
    protected $flyBehavior;
    protected $quackBehavior;

    /**
     * These methods replace
     *
     * @return void
     */
    abstract public function swim();

    public function display()
    {

        $arr = explode("\\", get_class($this));
        $path = base_path() . "\app\Components\Ducks\Images\\" . $arr[count($arr) - 1] . ".jpg";
        if (file_exists($path)) {
            $image = file_get_contents($path);
            return base64_encode($image);
        } else {
            return "";
        }

    }

    public function preformFly()
    {
        return $this->flyBehavior->fly();
    }

    public function preformQuack()
    {
        return $this->quackBehavior->quack();
    }

    /**
     * We can call these methods anytime we want to change the behavior of a duck on the fl y.
     *
     * @param FlyBehavior $fb
     * @return void
     */
    public function setFlyBehavior(FlyBehavior $fb)
    {
        $this->flyBehavior = $fb;
    }

    public function setQuackBehavior(QuackBehavior $qb)
    {
        $this->quackBehavior = $qb;
    }

}
