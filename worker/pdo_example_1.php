<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "test";

class User {
    public $id;
    public $first_name;
    public $last_name;
}

try {
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Execute query
    $query = "SELECT id, first_name, last_name FROM users";
    $stmt = $conn->query($query);
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'UserPdo');

    // Fetch data
    $rows = [];
    while ($row = $stmt->fetch()) {
        $rows[] = $row;
    }
    print_r($rows);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;