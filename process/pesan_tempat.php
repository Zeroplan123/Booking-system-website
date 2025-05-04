<?php
session_start();
require "../db.php";


if(isset($_POST["submit"])){

    $id_user = $_SESSION["id_user"];
    $id_tempat = $_POST["id_tempat"];
    $tanggal = $_POST["tanggal"];

    $sql = "INSERT INTO pemesanan (id_user, id_tempat, tanggal) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $id_user, $id_tempat, $tanggal);

    if ($stmt->execute()) {
        $_SESSION['pesan_sukses'] = "Pemesanan berhasil dilakukan.";
        header("Location: ../dashboard/dashboard_user.php");
    } else {
        $_SESSION['pesan_error'] = "Terjadi kesalahan: " . $conn->error;
    header("Location: ../dashboard/dashboard_user.php");
    }

    $stmt->close();
    $conn->clone();

}
?>