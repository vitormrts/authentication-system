<?php

namespace lib\database; 

define('HOST', 'localhost');
define('DB', 'system_login');
define('USER', 'root');
define('PASSWORD', 'Levelup@777');

abstract class Connection {
    private static $connection;

    public static function getConnection() {
        try {
            self::$connection = new \PDO('mysql: host=HOST; dbname=system_login', USER, PASSWORD);
        }
        catch (\PDOException $e) {
            die("It was not possible to connect to the database: " . $e->getMessage());
        }

        return self::$connection;
    }
}

?>