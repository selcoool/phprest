<?php

$host="localhost";
$username="root";
$password="";
$dbname="phprest";


$conn = mysqli_connect($host,$username,$password,$dbname);
if(!$conn){
   die("Connect Failed: ". mysqli_connect_error());
}


?>