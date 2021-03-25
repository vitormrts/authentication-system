<?php

namespace lib\database; 

abstract class Connection {
    private static $connection;

    public static function getConnection() {
        if (!self::$connection) {
            self::$connection = new \PDO('mysql: host=localhost; dbname=system_login', 'root', 'Levelup@777');
        }

        return self::$connection;
    }
}

?>