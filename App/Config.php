<?php

namespace App;

class Config
{

    public $data = [];

    protected static $instance = null;

    protected function __construct($data=[])
{
 $this-> data = $data;
}



    public static function instance() {
        $data =[
            'dbname'=>'test',
            'host' => 'localhost',
            'login' => 'root',
            'pass' => ''
        ];

        if(null === self::$instance){
            self::$instance = new self($data);
        }
        return self::$instance;
    }

}