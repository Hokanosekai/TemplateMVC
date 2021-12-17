<?php

class AutoLoad {

    public static function start() {
        spl_autoload_register(array(__CLASS__, 'load'));

        $root = $_SERVER['DOCUMENT_ROOT'];
        $host = $_SERVER['HTTP_HOST'];

        define('HOST', 'http://'.$host.'/');
        define('ROOT', $root.'/');

        define('CONTROLLERS', ROOT.'App/Controllers/');
        define('MODELS', ROOT.'App/Models/');
        define('ENTITIES', ROOT.'App/Entities/');
        define('VIEWS', ROOT.'App/Views/');
        define('UTILS', ROOT.'App/Utils/');
        define('IMAGES', ROOT.'assets/');

        define('ASSETS', HOST.'assets/');
    }

    public static function load($class) {
        if (file_exists(MODELS.$class.'.php')) {
            include_once(MODELS.$class.'.php');
        } elseif (file_exists(UTILS.$class.'.php')) {
            include_once(UTILS.$class.'.php');
        } elseif (file_exists(CONTROLLERS.$class.'.php')) {
            include_once(CONTROLLERS.$class.'.php');
        } elseif (file_exists(ENTITIES.$class.'.php')) {
            include_once(ENTITIES.$class.'.php');
        }
    }
}
