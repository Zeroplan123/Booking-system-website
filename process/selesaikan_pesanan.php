<?php
require "../db.php";

if(isset($_POST["submit"])){
    $id = $_POST['id'];
    $query = "UPDATE pemesanan SET status = 'selesai' WHERE id = $id";
    mysqli_query($conn, $query);
    header("Location: ../dashboard/dashboard_admin.php");
    exit;
}
?>