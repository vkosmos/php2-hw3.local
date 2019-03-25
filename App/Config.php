<?php

namespace App;

/**
 * Class Config
 * @package App
 */
class Config
{
    protected static $_instance = null;
    public $data = [];

    public static function getInstance()
    {
        if (null === self::$_instance){
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    protected function __construct()
    {
        $this->data = include __DIR__ . '\config_data.php';
    }

    public function getData()
    {
        return $this->data;
    }
}
