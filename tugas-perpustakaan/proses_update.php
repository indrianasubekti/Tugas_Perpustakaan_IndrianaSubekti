<?php
require_once "koneksi.php";

if (!isset($koneksi) || !$koneksi) {
    die("Koneksi database gagal. Periksa file koneksi.php.");
}

$id = isset($_POST["id"])   ? trim($_POST["id"])   : "";
$no_anggota = isset($_POST["no_anggota"]) ? trim($_POST["no_anggota"]) : "";
$nama_lengkap = isset($_POST["nama_lengkap"]) ? trim($_POST["nama_lengkap"]) : "";
$email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
$no_hp = isset($_POST["no_hp"]) ? trim($_POST["no_hp"]) : "";
$jenis_anggota = isset($_POST["jenis_anggota"]) ? trim($_POST["jenis_anggota"]) : "";
$alamat = isset($_POST["alamat"]) ? trim($_POST["alamat"]) : "";

$query = "UPDATE anggota SET no_anggota= ?, nama_lengkap= ?, email=?, no_hp= ?, jenis_anggota= ?, alamat= ? WHERE id= ?";
//menyiapkan prepared statement
$stmt = mysqli_prepare($koneksi, $query);
//mengikat parameter
mysqli_stmt_bind_param($stmt, "ssssssi", $no_anggota, $nama_lengkap, $email, $no_hp, $jenis_anggota, $alamat, $id);

//menjalankan query delete
if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    header("Location: data.php");
    exit;
} else {
    die ("Gagal memperbarui data: " . mysqli_stmt_error($stmt));
}

?>