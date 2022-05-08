<?php

class Logger {
    private static $instance;
    private $isShowing;
    const BR = "<br />";
    function __construct()
    {
        
    }

    function __clone()
    {
        
    }

    static function getInstance()  {
        if(!self::$instance)
            {
                self::$instance = new Logger;
            }
        return self::$instance;
    }

    function Alert($text) {
        if($this->isShowing)
            echo "Alert is showing".self::BR;
        else
            {
                $this->isShowing = true;
                echo $text.self::BR;
            }
    }
}

$ob1 = Logger::getInstance();
$ob2 = Logger::getInstance();

$ob1->Alert("hello");
$ob2->Alert("goodbye");

?>
