<?php
$conn = mysqli_connect("localhost", 'root', '', 'loginregister');
session_start();
if(!$conn){
    die("Connection failed : " . mysqli_connect_error());
}

?>