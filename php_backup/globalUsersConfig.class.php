<?php
require_once("userconfig.class.php");

class globalUsersConfig{
    public static $items = array();

    public static function addUser($key, $value){
        self::$items[$key] = $value;
    }
}

?>
