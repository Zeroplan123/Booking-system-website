<?php
session_start();
require "../db.php";

if(isset($_POST["submit"])){
    $nama_tempat = $_POST["nama_tempat"];
    $lokasi = $_POST["lokasi"];
    $deskripsi = $_POST["deskripsi"];

    $sql = "INSERT INTO tempat (nama_tempat, lokasi, deskripsi) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $nama_tempat, $lokasi, $deskripsi);

    if ($stmt->execute()) {
        $_SESSION['pesan_sukses'] = "Pemesanan berhasil dilakukan.";
        header("Location: ../dashboard/dashboard_admin.php");
    } else {
        $_SESSION['pesan_error'] = "Terjadi kesalahan: " . $conn->error;
    header("Location: ../dashboard/dashboard_admin.php");
    }
    $stmt->close();
    $conn->clone();
}

?>