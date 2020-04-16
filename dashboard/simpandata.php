<?php

require('../database/database.php');

$db = new Database();
$conn = $db->databaseConnection();

session_start();

if ($_SESSION['login_status'] != 'login') {
    header('location:../index.php?pesan=belum_login');
}

if (isset($_POST['simpanDataBtn'])) {
    $nama_warga = $_POST['nama_warga'];
    $nik_warga = $_POST['nik_warga'];
    $no_kartu_keluarga = $_POST['no_kartu_keluarga'];
    $agama_warga = $_POST['agama_warga'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $pekerjaan = $_POST['pekerjaan'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO warga_table (nama_warga, nik_warga, no_kartu_keluarga, agama_warga, jenis_kelamin, tanggal_lahir, pekerjaan, alamat) VALUES ('$nama_warga', '$nik_warga', '$no_kartu_keluarga', '$agama_warga', '$jenis_kelamin', '$tanggal_lahir', '$pekerjaan', '$alamat')";

    if (mysqli_query($conn, $query)) {
        header('location:../dashboard/index.php?pesan=sukses');
    } else {
        header('location:../dashboard/index.php?pesan=gagal');
    }
}

$conn->close();
