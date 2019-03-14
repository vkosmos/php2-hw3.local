<?php

namespace App;

/**
 * Class Config
 * @package App
 */
class Config
{
    protected static $_instance = null;
    protected static $data = [];

    public static function getInstance()
    {
        if (null === self::$_instance){
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    protected function __construct()
    {
        self::$data = include __DIR__ . '\config_data.php';
    }

    public function getData()
    {
        return self::$data;
    }
}
