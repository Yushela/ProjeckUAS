<?php
include 'db.php';

// Proses form tambah produk
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["tambah_produk"])) {
    $nama_produk = $_POST["nama_produk"];
    $deskripsi = $_POST["deskripsi"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];
    $user_id = 1; // Ganti dengan id user yang sedang login

    tambahProduk($nama_produk, $deskripsi, $harga, $stok, $user_id);
}

// Proses form edit produk
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_produk"])) {
    $produk_id = $_POST["produk_id"];
    $nama_produk = $_POST["nama_produk"];
    $deskripsi = $_POST["deskripsi"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];

    editProduk($produk_id, $nama_produk, $deskripsi, $harga, $stok);
}

// Proses hapus produk
if (isset($_GET["hapus_produk"])) {
    $produk_id = $_GET["hapus_produk"];
    hapusProduk($produk_id);
}

// Tampilkan produk
$produk = tampilkanProduk();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>

    <!-- Form tambah produk -->
    <form method="post" action="">
        <label for="nama_produk">Nama Produk:</label>
        <input type="text" name="nama_produk" required>
        <br>

        <label for="deskripsi">Deskripsi:</label>
        <textarea name="deskripsi" required></textarea>
        <br>

        <label for="harga">Harga:</label>
        <input type="text" name="harga" required>
        <br>

        <label for="stok">Stok:</label>
        <input type="text" name="stok" required>
        <br>

        <button type="submit" name="tambah_produk">Tambah Produk</button>
    </form>

    <!-- Tabel produk -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($produk as $p) : ?>
            <tr>
                <td><?php echo $p["produk_id"]; ?></td>
                <td><?php echo $p["nama_produk"]; ?></td>
                <td><?php echo $p["deskripsi"]; ?></td>
                <td><?php echo $p["harga"]; ?></td>
                <td><?php echo $p["stok"]; ?></td>
                <td>
                    <a href="dashboard.php?edit_produk=<?php echo $p["produk_id"]; ?>">Edit</a>
                    <a href="dashboard.php?hapus_produk=<?php echo $p["produk_id"]; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Form edit produk -->
    <?php
    if (isset($_GET["edit_produk"])) {
        $edit_produk_id = $_GET["edit_produk"];
        $produk_to_edit = tampilkanProdukById($edit_produk_id);
    ?>
        <form method="post" action="">
            <input type="hidden" name="produk_id" value="<?php echo $edit_produk_id; ?>">
            <label for="nama_produk">Nama Produk:</label>
            <input type="text" name="nama_produk" value="<?php echo $produk_to_edit["nama_produk"]; ?>" required>
            <br>

            <label for="deskripsi">Deskripsi:</label>
            <textarea name="deskripsi" required><?php echo $produk_to_edit["deskripsi"]; ?></textarea>
            <br>

            <label for="harga">Harga:</label>
            <input type="text" name="harga" value="<?php echo $produk_to_edit["harga"]; ?>" required>
            <br>

            <label for="stok">Stok:</label>
            <input type="text" name="stok" value="<?php echo $produk_to_edit["stok"]; ?>" required>
            <br>

            <button type="submit" name="edit_produk">Simpan Perubahan</button>
        </form>
    <?php
    }
    ?>
</body>
</html>

