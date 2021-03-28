<?php

namespace app\config; 

abstract class Connection {
    private static $connection;

    public static function getConnection() {
        try {
            self::$connection = new \PDO('mysql: host=' . DB_HOST . '; dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        }
        catch (\PDOException $e) {
            die("It was not possible to connect to the database: " . $e->getMessage());
        }

        return self::$connection;
    }
}

?>