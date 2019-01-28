<?php
class Singleton {
    private static $instance;
    private final function __construct() {}
    private final function __clone() {}
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
}

$obiekt1 = Singleton::getInstance();
 $s1 = serialize($obiekt1);
 $u1 = unserialize($s1);
var_dump($u1);
$obiekt2 = Singleton::getInstance();
var_dump($obiekt2);
