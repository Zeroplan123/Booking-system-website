<?php
require "../db.php";
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=data_pemesanan.xls");
header("Pragma: no-cache");
header("Expires: 0");

$query = " SELECT p.id, u.nama AS nama_pemesan, t.nama_tempat, p.tanggal, p.status
    FROM pemesanan p
    JOIN users u ON p.id_user = u.id_user
    JOIN tempat t ON p.id_tempat = t.id_tempat";
$stmt = $conn->query($query);

echo "<table border='1'>";
echo "<tr>
        <th>ID</th>
        <th>Nama Pemesan</th>
        <th>Nama Tempat</th>
        <th>Tanggal</th>
        <th>Status</th>
      </tr>";

      $i = 1;
      while ($row = $stmt->fetch_assoc()) {
        echo "<tr>
                <td>{$i}</td>
                <td>{$row['nama_pemesan']}</td>
                <td>{$row['nama_tempat']}</td>
                <td>{$row['tanggal']}</td>
                <td>{$row['status']}</td>
              </tr>";
        $i++;
    }
    
    echo "</table>";

    $conn->close();
?>