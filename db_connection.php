<?php
session_start();
session_regenerate_id(true);

$db_connection = mysqli_connect("localhost","root","","login_method");


if(!$db_connection)
{
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    echo "Connection Failed" . mysqli_connect_error();
    die("Connection failed: " . mysqli_connect_error());
    exit;
}
?>