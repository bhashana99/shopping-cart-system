<?php
$conn = new mysqli("localhost","root","","cart_system",3307);

if($conn->connect_error){
    die("Connection Failed!".$conn->connect_error);
}
?>