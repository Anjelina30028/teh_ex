<?php

namespace routes\Router;



class Router {

    private static $listPage = [];

    public static function addPage($uri, $page) {
        self::$listPage[] = 
        [
            "page" => $page,
            "uri" => $uri,
        ];
    }

    public static function Post($uri, $class, $method) {
    self::$listPage[] =[
        "uri" => $uri,
        "class" => $class,
        "method" => $method,
    ];
    }

    public static function Content(){
    
        $q = $_GET['q'];

        foreach (self::$listPage as $item) {
            if ($item['uri'] == '/'.$q) {
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $action = new $item['class'];
                    $method = $item['method'];
                    $action->$method($_POST);
                    break;

                }else{
                    require_once './views/'. $item['page'].'.php';
                    break;
                }
            }
        }
    
    }


}