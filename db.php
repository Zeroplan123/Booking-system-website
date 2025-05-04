<?php
$user = "root";
$password ="";
$host = "localhost";
$db = "booking_tempat";

$conn = mysqli_connect($host, $user, $password, $db);

if(!$conn){
    die("koneksi gagal :" . mysqli_connect_error())  ;
}
?>