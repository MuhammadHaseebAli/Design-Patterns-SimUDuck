<?php

namespace App\Http\Controllers;

use App\Components\Ducks\MallardDuck;
use App\Components\Ducks\ModelDuck;
use Illuminate\Http\Request;
use RecursiveDirectoryIterator;
use RegexIterator;

class MainController extends Controller
{
    //this is the main function where the request will fall at first
    public function index(Request $request)
    {
        $types = [
            'duckType' => $request->duckType,
            'flyBehavior' => $request->flyBehavior,
            'quackBehavior' => $request->quackBehavior
        ];

        $responses = [
            "display" => null,
            "fly" => null,
            "quack" => null
        ];

        $layout = [
            "type"=>"1",
            "cell_no"=>"1"
        ];

        if (!empty($types['duckType'])) {

            $duck_type = $this->getDuckInstance($types['duckType']);//$request->duck_type
            $responses["display"] = $duck_type->display();

            //set Fly behavior
            if (!empty($types["flyBehavior"])) {
                $fly_behavior_class = "App\Components\FlyBehaviorDir\\" . $types["flyBehavior"];
                $duck_type->setFlyBehavior(new  $fly_behavior_class);
                $responses['fly'] = $duck_type->preformFly();
            }

            //set Quack behavior
            if (!empty($types["quackBehavior"])) {
                $fly_behavior_class = "App\Components\QuackBehaviorDir\\" . $types["quackBehavior"];
                $duck_type->setQuackBehavior(new $fly_behavior_class);
                $responses['quack'] = $duck_type->preformQuack();
            }
        }
//        return $responses['display'];

        return view('main', [
            'names' => [
                'duck_names' => $this->getNamesFromClassString($this->getDuckClasses()),
                'flybehavior_names' => $this->getNamesFromClassString($this->getFlyBehaviorClasses()),
                'quackbehavior_names' => $this->getNamesFromClassString($this->getQuackBehaviorClasses())
            ]
            ,
            'type' => $types,
            'response' => $responses
        ]);
    }

    //get duck type class instance based on the user input
    public function getDuckInstance($duckType)
    {
        $class = "App\Components\Ducks\\$duckType";
        return new $class();
    }

    //This Function will return all the duck classes
    public function getDuckClasses()
    {
        $path = base_path() . "\\" . "app\Components\Ducks";

        return $this->getClassNameFromDirectory($path);
    }

    //This Function will return all the fly behavior classes
    public function getFlyBehaviorClasses()
    {
        $path = base_path() . "\\" . "app\Components\FlyBehaviorDir";

        return $this->getClassNameFromDirectory($path);
    }

    //This Function will return all the Quack behavior classes
    public function getQuackBehaviorClasses()
    {
        $path = base_path() . "\\" . "app\Components\QuackBehaviorDir";

        return $this->getClassNameFromDirectory($path);
    }

    // get Names From ClassName Path String
    public function getNamesFromClassString($array)
    {
        $response = [];
        foreach ($array as $item) {
            $temp = explode("\\", $item);
            $response[] = $temp[count($temp) - 1];
        }

        return $response;
    }

    //this is the function in which we pass the path and it will return all the classes in the path
    public function getClassNameFromDirectory($path)
    {

        $classess_name_with_ns = array();

        $allFiles = new RecursiveDirectoryIterator($path); // this is to iterate through the files in directory
        $phpFiles = new RegexIterator($allFiles, '/\.php$/');//Regular Expression to get only php files
//        dd($allFiles);

        foreach ($phpFiles as $phpFile) {
            $content = file_get_contents($phpFile->getRealPath());//get the code of file
            $tokens = token_get_all($content);//get tokens to extract Namespace
            $namespace = '';
            for ($index = 0; isset($tokens[$index]); $index++) {

                if (!isset($tokens[$index][0])) {
                    continue;
                }
                if (T_NAMESPACE === $tokens[$index][0]) { // if namespace word is found
                    $index += 2; // Skip namespace keyword and whitespace
                    while (isset($tokens[$index]) && is_array($tokens[$index])) {
                        $namespace .= $tokens[$index++][1];
                    }
                }
                if (T_CLASS === $tokens[$index][0] && T_WHITESPACE === $tokens[$index + 1][0] && T_STRING === $tokens[$index + 2][0]) {
                    $index += 2; // Skip class keyword and whitespace
                    $classess_name_with_ns[] = $namespace . '\\' . $tokens[$index][1];

                    //break if you have one class per file (psr-4 compliant)
                    // otherwise you'll need to handle class constants (Foo::class)
                    break;
                }
            }
        }
        return $classess_name_with_ns;
    }

}
