<?php

include('../database/database.php');
session_start();

if ($_SESSION['login_status'] != 'login') {
    header('location:../index.php?pesan=belum_login');
}

$db = new Database();
$conn = $db->databaseConnection();

$id_warga = $_GET['id'];

$query = "DELETE FROM warga_table WHERE id_warga=$id_warga";

if (mysqli_query($conn, $query)) {
    header('location:index.php?pesan=hapus_data_berhasil');
}

$conn->close();
