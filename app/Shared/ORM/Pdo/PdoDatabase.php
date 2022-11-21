<?php

namespace App\Shared\ORM\Pdo;

use App\Shared\Patterns\Singleton;
use PDO;

class PdoDatabase extends Singleton
{
    public static function connect()
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $database = "test";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function query(string $query, string $model): array
    {
        // Create new connection
        $conn = self::connect();

        // Execute query
        $stmt = $conn->query($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $model);

        // Prepare data
        $rows = [];
        while ($row = $stmt->fetch()) {
            $rows[] = $row;
        }
        $conn = null;
        return $rows;
    }
}

