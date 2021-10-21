<?php
include_once "env.php";

class DbConnection
{
    /**
     * @var PDO
     */
    static $connection = null;

    public static function getConnection(){
        if (!self::$connection){
            $dsn = "mysql:host=".HOST.";dbname=".DB_NAME;
            self::$connection = new PDO($dsn,USER,PASSWORD);
        }
        return self::$connection;
    }
    public function __destruct()
    {
        if (self::$connection){
            self::$connection = null;
        }
    }
}