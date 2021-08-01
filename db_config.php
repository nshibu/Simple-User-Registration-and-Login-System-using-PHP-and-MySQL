<?php

//server name
$server_name="localhost";

//database username
$user_name="root";

//user password
$password="";

//change database name
$database="users_app";

//database connection query
$conn = mysqli_connect($server_name, $user_name, $password, $database);

//if connection not estabilished, then follwing code executed.
if (!$conn) {
    die("Connection failed, Unable to connect database ");
}

?>