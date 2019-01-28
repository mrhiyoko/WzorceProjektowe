<?php
class Singleton {
    private static $instance;
    private  function __construct() {}
    private  function __clone() {}

    public static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
}

$l1 = Singleton::getInstance();
$l2 = Singleton::getInstance();
if ($l1 === $l2) {
    echo "Singleton has a single instance.";
} else {
    echo "Singletons are different.";
}


