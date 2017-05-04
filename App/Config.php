<?php

namespace App;

class Config
{

    public $data = [];

    protected static $instance = null;



    protected function __construct(){
        $this->data = include __DIR__ . '\connection.php';
    }

    public static function instance() {

        if(null === self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }

}