<?php
$servername = "localhost";
$connusername = "root";
$connpassword = "";
$dbname = "holyinfant";

$conn = new mysqli($servername, $connusername, $connpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};
