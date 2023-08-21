<?php
namespace App\Core;
class Validator{
    public static array $errors = [];

    public static function isVide($field,$key,$message = "ce champs est obligatoire"){
             if (empty($field)) {
                  self::$errors[$key] = $message;
             }
    }
    public static function isPositive($field,$key,$message = "ce champs doit etre positive"){
        if (($field <= 0)) {
             self::$errors[$key] = $message;
        }elseif (!is_numeric($field)) {
            self::$errors[$key] = "ce champ ne doit pas etre une chaine";  
        }
}

    public static function validate():bool{
        return count(self::$errors) == 0;
    }

}