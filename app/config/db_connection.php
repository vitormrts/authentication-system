<?php

namespace app\config; 

abstract class Connection {
    private static $connection;

    public static function getConnection() {
        try {
            self::$connection = new \PDO('mysql: host=' . getenv('DB_HOST') . '; dbname=' . getenv('DB_NAME'), getenv('DB_USER'), getenv('DB_PASS'));
        }
        catch (\PDOException $e) {
            echo "\n\naaa\n".getenv('DB_HOST');
            die("It was not possible to connect to the database: " . $e->getMessage());
        }

        return self::$connection;
    }
}

?>