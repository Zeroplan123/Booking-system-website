<?php
require "../db.php";

if(isset($_POST["submit"])){
    $id_pesanan = $_GET['id'];
    $id = $_POST['id'];
    $query = "UPDATE pemesanan SET status = 'diterima' WHERE id = $id";
    mysqli_query($conn, $query);
    header("Location: ../dashboard/dashboard_admin.php");
    exit;
}
?>