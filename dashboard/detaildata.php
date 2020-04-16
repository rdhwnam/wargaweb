<?php

require_once('../database/database.php');
session_start();

if ($_SESSION['login_status'] != 'login') {
    header('location:../index.php?pesan=belum_login');
}

$db = new Database();
$conn = $db->databaseConnection();

$id = $_GET['id'];
$query = "SELECT * FROM warga_table WHERE id_warga=$id";

$result = mysqli_query($conn, $query);

?>

<?php include('template/header.php'); ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <span><i class="fas fa-users"></i></span> Detail Data Warga
        </div>
        <?php while ($data_warga = mysqli_fetch_array($result)) { ?>
            <form class="form" method="POST" action="updatedata.php">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm">
                            <label for="id_warga">ID</label>
                            <input type="text" name="id_warga" id="id_warga" value="<?php echo $data_warga['id_warga'] ?>" class="form-control" disabled>
                        </div>
                        <div class="col-sm">
                            <label for="nama_warga">Nama</label>
                            <input type="text" name="nama_warga" id="nama_warga" value="<?php echo $data_warga['nama_warga'] ?>" class="form-control">
                        </div>
                        <div class="col-sm">
                            <label for="nik_warga">NIK</label>
                            <input type="text" name="nik_warga" id="nik_warga" value="<?php echo $data_warga['nik_warga'] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <label for="no_kartu_keluarga">No. Kartu Keluarga</label>
                            <input type="text" name="no_kartu_keluarga" id="no_kartu_keluarga" value="<?php echo $data_warga['no_kartu_keluarga'] ?>" class="form-control">
                        </div>
                        <div class="col-sm">
                            <label for="agama_warga">Agama</label>
                            <select name="agama_warga" id="agama_warga" class="form-control" required>
                                <option value="Islam" <?php if ($data_warga['agama_warga'] == 'Islam') echo "selected" ?>>Islam</option>
                                <option value="Protestan" <?php if ($data_warga['agama_warga'] == 'Protestan') echo "selected" ?>>Protestan</option>
                                <option value="Katolik" <?php if ($data_warga['agama_warga'] == 'Katolik') echo "selected" ?>>Katolik</option>
                                <option value="Hindu" <?php if ($data_warga['agama_warga'] == 'Hindu') echo "selected" ?>>Hindu</option>
                                <option value="Budha" <?php if ($data_warga['agama_warga'] == 'Budha') echo "selected" ?>>Budha</option>
                                <option value="Khonghucu" <?php if ($data_warga['agama_warga'] == 'Khonghucu') echo "Khonghucu" ?>>Khonghucu</option>
                            </select>
                        </div>
                        <div class="col-sm">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                <option value="Laki-Laki" <?php if ($data_warga['jenis_kelamin'] == 'Laki-Laki') echo "selected" ?>>Laki-Laki</option>
                                <option value="Wanita" <?php if ($data_warga['jenis_kelamin'] == 'Wanita') echo "selected" ?>>Wanita</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo $data_warga['tanggal_lahir'] ?>" class="form-control">
                        </div>
                        <div class="col-sm">
                            <label for="pekerjaan">Pekerjaan</label>
                            <select name="pekerjaan" id="pekerjaan" class="form-control" required>
                                <option value="Wirausaha" <?php if ($data_warga['pekerjaan'] == 'Wirausaha') echo "selected" ?>>Wirausaha</option>
                                <option value="Wiraswasta" <?php if ($data_warga['pekerjaan'] == 'Wiraswasta') echo "selected" ?>>Wiraswasta</option>
                                <option value="Pelajar/Mahasiswa" <?php if ($data_warga['pekerjaan'] == 'Pelajar/Mahasiswa') echo "selected" ?>>Pelajar/Mahasiswa</option>
                            </select>
                        </div>
                        <div class="col-sm">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"><?php echo $data_warga['alamat'] ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <!-- update data button -->
                    <button type="submit" class="btn btn-sm btn-success" name="updateDataBtn"><span><i class="far fa-edit"></i></span> Update</a></button>

                    <!-- delete data button -->
                    <a onclick=" return confirm('Yakin Dihapus?')" href="hapusdata.php?id=<?php echo $data_warga['id_warga'] ?>" class="btn btn-sm btn-danger" role="button"><span><i class="fas fa-trash-alt"></i></span> Hapus</a>
                    <!-- cancel button | back to dashboard index -->
                    <a href="index.php" class="btn btn-sm btn-danger" role="button"><span><i class="far fa-window-close"></i></span> Cancel</a>
                </div>
            </form>
        <?php };
        $conn->close(); ?>
    </div>
</div>

<?php include('template/footer.php'); ?>