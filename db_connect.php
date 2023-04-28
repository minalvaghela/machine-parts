<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mydb";

$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    echo "Connecrion NOt Sucess";
}
?>