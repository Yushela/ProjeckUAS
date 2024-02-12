<?php
include 'db.php';

// Tampilkan semua produk
$produk = tampilkanProduk();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk</title>
</head>
<body>
    <h1>Katalog Produk</h1>

    <!-- Tabel produk -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Stok</th>
        </tr>
        <?php foreach ($produk as $p) : ?>
            <tr>
                <td><?php echo $p["produk_id"]; ?></td>
                <td><?php echo $p["nama_produk"]; ?></td>
                <td><?php echo $p["deskripsi"]; ?></td>
                <td><?php echo $p["harga"]; ?></td>
                <td><?php echo $p["stok"]; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

