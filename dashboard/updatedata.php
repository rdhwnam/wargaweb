<?php

require_once('../database/database.php');

session_start();

if ($_SESSION['login_status'] != 'login') {
    header('location:../index.php?pesan=belum_login');
}

$db = new Database();
$conn = $db->databaseConnection();

$id_warga = $_POST['id_warga'];
$nama_warga = $_POST['nama_warga'];
$nik_warga = $_POST['nik_warga'];
$no_kartu_keluarga = $_POST['no_kartu_keluarga'];
$agama_warga = $_POST['agama_warga'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$pekerjaan = $_POST['pekerjaan'];
$alamat = $_POST['alamat'];

$query = "UPDATE warga_table SET nama_warga='$nama_warga',nik_warga='$nik_warga',no_kartu_keluarga='$no_kartu_keluarga',agama_warga='$agama_warga',jenis_kelamin='$jenis_kelamin',tanggal_lahir='$tanggal_lahir',pekerjaan='$pekerjaan',alamat='$alamat' WHERE id_warga='$id_warga'";

$update_result = mysqli_query($conn, $query);

if ($update_result) {
    header('location:index.php?pesan=sukses_update_data');
}

$conn->close();
