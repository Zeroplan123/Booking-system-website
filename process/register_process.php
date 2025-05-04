<?php
require "../db.php";

if(isset($_POST["submit"])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (nama, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama, $email, $password);

    if($stmt->execute()){
        echo "registrasi berhasil";
        header("Location: ../index.php");
    }else{
        echo "registrasi gagal" . $stmt->error();
    }

    $stmt->close();
    $conn->close();
}
?>