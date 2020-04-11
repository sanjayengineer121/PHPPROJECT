<?php
$servername = "localhost";
$username = "root";
$password = "phpmyadmin@localhost";
$db="CSE_PROJECT";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
