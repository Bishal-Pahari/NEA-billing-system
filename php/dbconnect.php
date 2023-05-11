<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "billing_system";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
else{
    echo "Connected successfully";
}
