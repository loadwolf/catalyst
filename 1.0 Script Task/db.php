<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "catalyst";
$table = 'users';

// Create connection
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE $dbname ";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    //echo "NOTE: " . $conn->error . '<br>';
}
$conn->close();

// sql to create table
$sql = "
        CREATE TABLE IF NOT EXISTS users ( 
        name VARCHAR(30) NOT NULL,
        surname VARCHAR(30) NOT NULL,
        email VARCHAR(50) NOT NULL,
        UNIQUE KEY unique_email (email)
    )";


$conn2 = new mysqli($servername, $username, $password, $dbname);    
if ($conn2->query($sql) === TRUE) {
    //echo "Table MyGuests created successfully";
} else {
    //echo "NOTE: " .  $conn2->error. '<br>';
}

$conn2->close();


?>


