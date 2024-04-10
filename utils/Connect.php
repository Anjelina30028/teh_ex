<?php

namespace utils\Connect;

class Connect{
    public static $path = '/utils/database.json';

    public static function check($word) // проверка слова на специальные символы и пробелы
    {
        $word = trim(htmlspecialchars($word));
        return $word;
    }
    public static function add(){  // добавлеяем в файл json объект
        $array = [
            'name' => self::check($_POST['name']),
            'phone' => self::check($_POST['phone']) 
        ];

        $db = file_get_contents(dirname(__DIR__).self::$path);

        if(empty($db)){
            file_put_contents(dirname(__DIR__).self::$path, "{}",LOCK_EX);
        };

        $database = json_decode($db,true);
        array_push($database, $array);
        file_put_contents(dirname(__DIR__).self::$path, json_encode($database),LOCK_EX);
        header('Location: /');
    }

    public static function get(){ //берем из файла все значения
        $array = json_decode(file_get_contents(dirname(__DIR__).self::$path),true);
        return $array;
    }

    public static function delete(){
        $database = json_decode(file_get_contents(dirname(__DIR__).self::$path),true);

        foreach($database as $key=>$item){
            if($item['phone'] == $_POST['phone']){
                echo "Найдено";
                unset($database[$key]);
                break;
            }
        }

        file_put_contents(dirname(__DIR__).self::$path, json_encode($database),LOCK_EX);
        header('Location: /');

    }
}

