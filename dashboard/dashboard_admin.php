<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header("Location: ../login.php");
    exit;
}

require "../db.php";

$query = " SELECT p.id, u.nama AS nama_pemesan, t.nama_tempat, p.tanggal, p.status
    FROM pemesanan p
    JOIN users u ON p.id_user = u.id_user
    JOIN tempat t ON p.id_tempat = t.id_tempat
    WHERE p.status = 'diproses'";
    
$result = mysqli_query($conn, $query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
    <div class="flex flex-col min-h-screen">
        <!-- Header -->
        <header class="bg-primary text-white shadow-md">
            <div class="container mx-auto px-4 py-4 flex justify-between items-center">
                <h1 class="text-2xl font-bold">Admin Dashboard</h1>
                <a href="../logout.php" 
                   onclick="return confirm('Yakin ingin logout?')" 
                   class="bg-white text-primary hover:bg-cream hover:text-primary font-semibold py-2 px-4 rounded-lg transition duration-300 flex items-center gap-2">
                    <span>Logout</span>
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow container mx-auto px-4 py-8">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-cream">
                <div class="p-6 bg-gradient-to-r from-primary to-secondary text-white">
                    <h2 class="text-xl font-semibold">Daftar Pemesanan Aktif</h2>
                    <p class="text-sm opacity-80">Menampilkan semua pemesanan yang belum selesai</p>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-cream text-primary">
                                <th class="px-6 py-4 font-semibold">ID</th>
                                <th class="px-6 py-4 font-semibold">Nama Pemesan</th>
                                <th class="px-6 py-4 font-semibold">Tempat</th>
                                <th class="px-6 py-4 font-semibold">Tanggal</th>
                                <th class="px-6 py-4 font-semibold">Status</th>
                                <th class="px-6 py-4 font-semibold">Aksi</th>
                                <th> <button type="submit" name="cetak" 
                                            class="bg-secondary hover:bg-primary text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                                            <a href="../process/export_excel.php" class="btn btn-success" target="_blank">Export ke Excel</a>
                                        </button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(mysqli_num_rows($result) > 0): ?>
                                <?php while($row = mysqli_fetch_assoc($result)) : ?>
                                <tr class="border-b border-cream hover:bg-light transition duration-200">
                                    <td class="px-6 py-4"><?= $row['id'] ?></td>
                                    <td class="px-6 py-4 font-medium"><?= $row['nama_pemesan'] ?></td>
                                    <td class="px-6 py-4"><?= $row['nama_tempat'] ?></td>
                                    <td class="px-6 py-4"><?= $row['tanggal'] ?></td>
                                    <td class="px-6 py-4">
                                        <?php if($row['status'] == 'pending'): ?>
                                            <span class="inline-block px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-medium">
                                                Pending
                                            </span>
                                        <?php elseif($row['status'] == 'confirmed'): ?>
                                            <span class="inline-block px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">
                                                Confirmed
                                            </span>
                                        <?php else: ?>
                                            <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">
                                                <?= ucfirst($row['status']) ?>
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="../process/selesaikan_pesanan.php" method="POST">
                                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                            <button type="submit" name="submit" 
                                                class="bg-secondary hover:bg-primary text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                                                Terima
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                        Tidak ada pemesanan aktif saat ini
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

       <!-- Add Form Container -->
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-cream mb-8">
        <div class="p-6 bg-gradient-to-r from-primary to-secondary text-white">
            <h2 class="text-xl font-semibold">Tambah Tempat Baru</h2>
            <p class="text-sm opacity-80">Isi form berikut untuk menambahkan tempat baru</p>
        </div>
        
        <form action="../process/tambah_tempat.php" method="post" class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2 md:col-span-1">
                <label for="nama_tempat" class="block text-sm font-medium text-gray-700">Masukan Nama tempat:</label>
                <input type="text" name="nama_tempat" id="nama_tempat" placeholder="Nama tempat baru" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent bg-light transition duration-200" />
            </div>

            <div class="space-y-2 md:col-span-1">
                <label for="lokasi" class="block text-sm font-medium text-gray-700">Masukan lokasi tempat:</label>
                <input type="text" name="lokasi" id="lokasi" placeholder="Lokasi tempat baru" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent bg-light transition duration-200" />
            </div>

            <div class="space-y-2 md:col-span-2">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Masukan deskripsi tempat:</label>
                <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi tempat baru" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent bg-light h-32 resize-none transition duration-200"></textarea>
            </div>

            <div class="md:col-span-2 flex justify-end">
                <button type="submit" name="submit"
                    class="bg-secondary hover:bg-primary text-white font-medium py-3 px-6 rounded-lg transition duration-300 flex items-center gap-2 shadow-md hover:shadow-lg">
                    <i class="fas fa-plus"></i>
                    <span>Tambahkan Tempat</span>
                </button>
            </div>
        </form>
    </div>
</div>
</div>



<<?php if (isset($_SESSION['pesan_sukses'])): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukses',
        text: '<?= $_SESSION['pesan_sukses']; ?>',
    });
</script>
<?php unset($_SESSION['pesan_sukses']); endif; ?>

</body>
</html>