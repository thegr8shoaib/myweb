<?php


$conn = new mysqli("localhost","shoaib","test1234test","ninja_pizza");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


 ?>
