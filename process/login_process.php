<?php
session_start();
require "../db.php";

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE nama = ?");
    $stmt->bind_param("s", $nama);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['level'] = $user['level'];

            // Redirect based on role
            if ($user['level'] === 'admin') {
                header("Location: ../dashboard/dashboard_admin.php");
            } else {
                header("Location: ../dashboard/dashboard_user.php");
            }
            exit;
        } else {
            echo "Password salah.";
        }
    } else {
        echo "user tidak ditemukan.";
    }

    $stmt->close();
    $conn->close();
}
?>