<?php

$host='localhost';
$user='root';
$pass='';
$db2='employee database';
$conn=new mysqli($host, $user, $pass, $db2);
if($conn->connect_error){
    echo"Failed to connect DB".$conn->connect_error;
}
?>