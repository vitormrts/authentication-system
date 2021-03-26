<?php

namespace lib\database; 

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