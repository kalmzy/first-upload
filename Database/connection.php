<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "erp";
$port = 4306;

$conn = new mysqli($servername, $username, $password, $dbname, $port);
if ($conn->connect_error)
{
    die("". $conn->connect_error);

}
//echo"database connected";
?>