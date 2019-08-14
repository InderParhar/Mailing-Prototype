<?php
$dbname ='gmail';
// Create connection
$conn_db = new mysqli("localhost", "root", "",$dbname);
// Check connection
if ($conn_db->connect_error) {
    die("Connection failed: " . $conn_db->connect_error);
} 





// sql to create table


?>