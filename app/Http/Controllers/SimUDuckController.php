<?php

namespace App\Http\Controllers;

use App\SimUDuck\FlyRocketPowered;
use App\SimUDuck\ModelDuck;
use Illuminate\Http\Request;
use App\SimUDuck\MallardDuck;


class SimUDuckController extends Controller
{
    public function main(Request $request)
    {
        //duck type
        if ($request->duckType == "model-duck") {
            $duck = new ModelDuck();
        } else if ($request->duckType == "mallard-duck") {
            $duck = new MallardDuck();
        } else {
            dd("Invalid Type");
        }

        //duck actions
        if ($request->action == "display") {
            $duck->display();
        } else if ($request->action == "quack") {
            $duck->preformQuack();
        } else if ($request->action == "fly") {
            $duck->preformFly();
        } else if ($request->action == "fly-rocket") {
            $duck->setFlyBehavior(new FlyRocketPowered());
            $duck->preformFly();
        } else {
            dd("Invalid Action");
        }

    }
}
