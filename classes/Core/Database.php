<?php


namespace Core;


class Database
{
    private static $class;
    public static $mavariable = 'bibi';
    private static $connection = null;

    public function __construct($class)
    {
        $this->class = $class;
    }

    public static function getConnection($class) {
        self::$class = $class;
        if(is_null(self::$connection)) {
            self::$connection = new self::$class('mysql:host=localhost;dbname=aston;', 'skynet', 'belooga');
            print 'singleton appelé!';
        }
        return self::$connection;
    }

}