<?php

$host = "localhost";
$username = "username_db";
$password = "password_db";
$database = "nama_database";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

function tambahProduk($nama_produk, $deskripsi, $harga, $stok, $user_id) {
    global $conn;
    $sql = "INSERT INTO produk (nama_produk, deskripsi, harga, stok, user_id) VALUES ('$nama_produk', '$deskripsi', $harga, $stok, $user_id)";
    return $conn->query($sql);
}

function editProduk($produk_id, $nama_produk, $deskripsi, $harga, $stok) {
    global $conn;
    $sql = "UPDATE produk SET nama_produk='$nama_produk', deskripsi='$deskripsi', harga=$harga, stok=$stok WHERE produk_id=$produk_id";
    return $conn->query($sql);
}

function hapusProduk($produk_id) {
    global $conn;
    $sql = "DELETE FROM produk WHERE produk_id=$produk_id";
    return $conn->query($sql);
}

function tampilkanProduk() {
    global $conn;
    $sql = "SELECT * FROM produk";
    $result = $conn->query($sql);
    $produk = [];
    while ($row = $result->fetch_assoc()) {
        $produk[] = $row;
    }
    return $produk;
}

?>
