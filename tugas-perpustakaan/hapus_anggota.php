<?php
require_once "koneksi.php";

if (!isset($koneksi) || !$koneksi) {
    die("Koneksi database gagal. Periksa file koneksi.php.");
}

$id = $_POST['id'];

// Membuat Query Delete
$query = "DELETE FROM anggota WHERE id = ?";
// Menyiapkan prepared statement
$stmt = mysqli_prepare($koneksi, $query);
// Mengikat parameter
mysqli_stmt_bind_param($stmt, "i", $id);

// Menjalankan query DELETE
if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    header ("Location: data.php");
    exit;
} else {
    die("Gagal menghapus data: " . mysqli_stmt_error($stmt));
}




