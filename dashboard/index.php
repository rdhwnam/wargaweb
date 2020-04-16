<?php

require_once('../database/database.php');
session_start();

if ($_SESSION['login_status'] != 'login') {
    header('location:../index.php?pesan=belum_login');
}

$db = new Database();
$conn = $db->databaseConnection();

?>

<?php include('template/header.php'); ?>

<?php

if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == 'sukses') {
        echo "<script>alert('Data Berhasil Disimpan');</script>";
    } else if ($_GET['pesan'] == 'gagal') {
        echo "<script>alert('Data Gagal Disimpan');</script>";
    } else if ($_GET['pesan'] == 'sukses_update_data') {
        echo "<script>alert('Data Sukses Diupdate');</script>";
    } else if ($_GET['pesan'] == 'hapus_data_berhasil') {
        echo "<script>alert('Data Berhasil Dihapus');</script>";
    }
}

?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <span><i class="fas fa-users"></i></span> Data Penduduk
        </div>
        <div class="card-body">
            <?php
            $query = "SELECT id_warga, nama_warga, nik_warga, agama_warga, jenis_kelamin, pekerjaan FROM warga_table";
            $result = mysqli_query($conn, $query);
            ?>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Agama</th>
                        <th>Jenis Kelamin</th>
                        <th>Pekerjaan</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($data_warga = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $data_warga['nama_warga'] . "</td>";
                        echo "<td>" . $data_warga['nik_warga'] . "</td>";
                        echo "<td>" . $data_warga['agama_warga'] . "</td>";
                        echo "<td>" . $data_warga['jenis_kelamin'] . "</td>";
                        echo "<td>" . $data_warga['pekerjaan'] . "</td>";
                        echo "<td>" . "<a class='btn btn-sm btn-success' href='detaildata.php?id=$data_warga[id_warga]' role='button'><span><i class='fas fa-info-circle'></i></span> Detail</a>" . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modalTambahData"><span><i class="far fa-plus-square"></i></span> Tambah</button>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="modalTambahData" tabindex="-1" role="dialog" aria-labelledby="modalTambahDataTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahDataTitle">Tambah Data Warga</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="simpandata.php" method="POST" class="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_warga">Nama Lengkap</label>
                        <input type="text" name="nama_warga" id="nama_warga" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nik_warga">NIK</label>
                        <input type="text" name="nik_warga" id="nik_warga" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="no_kartu_keluarga">Nomor Kartu Keluarga</label>
                        <input type="text" name="no_kartu_keluarga" id="no_kartu_keluarga" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="agama_warga">Agama</label>
                        <select name="agama_warga" id="agama_warga" class="form-control" required>
                            <option value="Pilih Agama" selected disabled>Pilih Agama</option>
                            <option value="Islam">Islam</option>
                            <option value="Protestan">Protestan</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                            <option value="Khonghucu">Konghucu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                            <option value="" selected disabled>Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan</label>
                        <select name="pekerjaan" id="pekerjaan" class="form-control" required>
                            <option value="" selected disabled>Pilih Pekerjaan</option>
                            <option value="Wirausaha">Wirausaha</option>
                            <option value="Wiraswasta">Wiraswasta</option>
                            <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-success" name="simpanDataBtn"><span><i class="far fa-save"></i></span> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('template/footer.php'); ?>