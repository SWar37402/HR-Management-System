<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "employee database";

$con = mysqli_connect("$host", "$username", "$password", "$database");

if(!$con)
{
    header("Location: errors/db.php");
    die();
}
?>