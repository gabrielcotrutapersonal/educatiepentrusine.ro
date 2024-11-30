<?php

namespace App;

use mysqli;

class Database
{
    private static $connection;

    public static function getConnection(): mysqli
    {
        if (self::$connection === null) {
            $host = Config::get('database.dbHost');
            $user = Config::get('database.dbUser');
            $password = Config::get('database.dbPass');
            $dbname = Config::get('database.dbName');

            // Remove debug output
            self::$connection = new mysqli($host, $user, $password, $dbname);

            if (self::$connection->connect_error) {
                throw new \Exception("Database connection failed: " . self::$connection->connect_error);
            }
        }

        return self::$connection;
    }
}
