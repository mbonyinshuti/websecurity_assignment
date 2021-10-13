<?php
$db="partnership";
$username="root";
$password="";
$server="localhost";

$conn= new mysqli($server,$username,$password,$db);

if ($conn->connect_error){
    die("connection failed:".$conn->connect_error);
}


?>