<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header("Location: ../login.php");
    exit;
}
require "../db.php";

$user_id = $_SESSION["id_user"];

// Get list of all places for dropdown
$tempatResult = $conn->query("SELECT id_tempat, nama_tempat FROM tempat");

// Get orders that are being processed for this user
$processingOrdersQuery = "SELECT p.id, p.tanggal, p.status, t.nama_tempat, t.lokasi 
                         FROM pemesanan p 
                         JOIN tempat t ON p.id_tempat = t.id_tempat 
                         WHERE p.id_user = ? AND p.status = 'diproses'
                         ORDER BY p.tanggal DESC";
$stmt_diproses = $conn->prepare($processingOrdersQuery);
$stmt_diproses->bind_param("i", $user_id);
$stmt_diproses->execute();
$result_diproses = $stmt_diproses->get_result();
$diproses = $result_diproses->fetch_all(MYSQLI_ASSOC);

// Get completed orders for this user
$completedOrdersQuery = "SELECT p.id, p.tanggal, p.status, t.nama_tempat, t.lokasi 
                        FROM pemesanan p 
                        JOIN tempat t ON p.id_tempat = t.id_tempat 
                        WHERE p.id_user = ? AND p.status = 'diterima'
                        ORDER BY p.tanggal DESC";
$stmt_selesai = $conn->prepare($completedOrdersQuery);
$stmt_selesai->bind_param("i", $user_id);
$stmt_selesai->execute();
$result_selesai = $stmt_selesai->get_result();
$selesai = $result_selesai->fetch_all(MYSQLI_ASSOC);

$updateStatusQuery = "UPDATE pemesanan SET status = 'selesai' 
                      WHERE status = 'diterima' AND tanggal < CURDATE() AND id_user = ?";
$stmt_update = $conn->prepare($updateStatusQuery);
$stmt_update->bind_param("i", $user_id);
$stmt_update->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pemesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0118D8',
                        secondary: '#1B56FD',
                        cream: '#E9DFC3',
                        light: '#FFF8F8',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-light min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-primary">Dashboard Pemesanan</h1>
            <a href="../logout.php" 
               onclick="return confirm('Yakin ingin logout?')" 
               class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded transition duration-300">
                Logout
            </a>
        </div>

        <!-- Form Pemesanan -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-xl font-semibold text-secondary mb-4">Buat Pemesanan Baru</h2>
            <form action="../process/pesan_tempat.php" method="post" class="space-y-4">
                <div>
                    <label for="tempat" class="block text-sm font-medium text-gray-700 mb-1">Pilih tempat yang mau dipesan:</label>
                    <select name="id_tempat" id="tempat" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-secondary focus:border-secondary" required>
                        <option value="">-- Pilih Tempat --</option>
                        <?php while($row = $tempatResult->fetch_assoc()) : ?>
                        <option value="<?= $row["id_tempat"] ?>"><?= htmlspecialchars($row['nama_tempat']) ?></option>
                        <?php endwhile ?>
                    </select>
                </div>

                <div>
                    <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-1">Tanggal pemesanan:</label>
                    <input type="date" name="tanggal" id="tanggal" min="<?= date('Y-m-d'); ?>" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-secondary focus:border-secondary" required>
                </div>
                
                <button type="submit" name="submit" class="px-6 py-2 bg-primary hover:bg-secondary text-white font-medium rounded-md transition duration-200">
                    Pesan Sekarang
                </button>
            </form>
        </div>
        
        <!-- Pesanan Diproses -->
        <div class="mb-8">
            <h2 class="text-2xl font-semibold text-primary mb-4">Pesanan Sedang Diproses</h2>
            
            <?php if (empty($diproses)): ?>
                <div class="bg-cream bg-opacity-30 rounded-lg p-4 text-center">
                    <p class="text-gray-600">Tidak ada pesanan yang sedang diproses.</p>
                </div>
            <?php else: ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($diproses as $item): ?>
                        <div class="bg-white rounded-lg shadow-md overflow-hidden border-l-4 border-secondary">
                            <div class="p-5">
                                <h3 class="text-lg font-semibold text-secondary mb-2"><?= htmlspecialchars($item['nama_tempat']) ?></h3>
                                <div class="space-y-2 text-gray-600">
                                    <p class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span><?= htmlspecialchars($item['lokasi']) ?></span>
                                    </p>
                                    <p class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span><?= date('d F Y', strtotime($item['tanggal'])) ?></span>
                                    </p>
                                </div>
                                <div class="mt-4 flex justify-between items-center">
                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-medium">
                                        <?= htmlspecialchars($item['status']) ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Pesanan Selesai -->
        <div>
            <h2 class="text-2xl font-semibold text-primary mb-4">Pesanan Selesai</h2>
            
            <?php if (empty($selesai)): ?>
                <div class="bg-cream bg-opacity-30 rounded-lg p-4 text-center">
                    <p class="text-gray-600">Belum ada pesanan yang selesai.</p>
                </div>
            <?php else: ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($selesai as $item): ?>
                        <div class="bg-white rounded-lg shadow-md overflow-hidden border-l-4 border-green-500">
                            <div class="p-5">
                                <h3 class="text-lg font-semibold text-primary mb-2"><?= htmlspecialchars($item['nama_tempat']) ?></h3>
                                <div class="space-y-2 text-gray-600">
                                    <p class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span><?= htmlspecialchars($item['lokasi']) ?></span>
                                    </p>
                                    <p class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span><?= date('d F Y', strtotime($item['tanggal'])) ?></span>
                                    </p>
                                </div>
                                <div class="mt-4 flex justify-between items-center">
                                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">
                                        <?= htmlspecialchars($item['status']) ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if (isset($_SESSION['pesan_sukses'])): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukses',
        text: '<?= $_SESSION['pesan_sukses']; ?>',
    });
</script>
<?php unset($_SESSION['pesan_sukses']); endif; ?>

<?php if (isset($_SESSION['pesan_error'])): ?>
<script>
Swal.fire({
  icon: "error",
  title: "Oops...",
  text: '<?= $_SESSION['pesan_error']; ?>';
});
</script>
<?php unset($_SESSION['pesan_error']); endif; ?>


</body>
</html>