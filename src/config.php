<?php
$server = "localhost";
$dbo = "jachymczak_project";
$user = "root";
$password = "";
$connection = mysqli_connect($server, $user, $password, $dbo);
if ($connection->connect_error) {
    echo "Connection Error : " . $connection->connect_error;
}
