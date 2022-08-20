<?php

$server_name = 'localhost';
$user_name   = 'root';
$password    = '';
$database    = 'codeweekend';

$conn = new mysqli($server_name,$user_name,$password,$database);
// var_dump($connection);
// $sql_query = "INSERT INTO crudphpassignments7 (first_name,last_name,email) values ('zabi','seerat','zabi@gmail.com')";
// $conn->query($sql_query);

if($conn->connect_error){
die ("something went wrong". $conn->connect_error);
}

?>