<?php
require_once 'function.php';
$id = isset($_GET['id']) ? $_GET['id'] : "";
if ($id != "") {
    $del = mysqli_query($conn, "DELETE FROM tbsiswa WHERE id=$id");
    if ($del) {
        echo "<script>alert('HAPUS BERHASIL');location.href='?hal=tampil';</script>";
    }
}
$data = mysqli_query($conn, "SELECT * FROM tbsiswa ORDER BY nama_siswa ASC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style2.css" />
    <title>Tampil Siswa</title>
</head>

<body>
    <h1 class="judul">DATA SISWA</h1>
    <center>
        <a class="link" href="?hal=tambah">Tambah Data</a>
        <br><br>
        <table border="1" cellpadding="8" cellspacing="0" class="table">
            <tr>
                <th>NO</th>
                <th>NIS</th>
                <th>NISN</th>
                <th>NAMA SISWA</th>
                <th>ALAMAT</th>
                <th>HP</th>
                <th>AGAMA</th>
                <th>JENIS KELAMIN</th>
                <th>AKSI</th>
            </tr>
            <?php
            $no = 1;
            foreach ($data as $row): ?>
                <tr class="tr">
                    <td>
                        <?= $no++ ?>
                    </td>
                    <td>
                        <?= $row['nis'] ?>
                    </td>
                    <td>
                        <?= $row['nisn'] ?>
                    </td>
                    <td class="text">
                        <?= $row['nama_siswa'] ?>
                    </td>
                    <td>
                        <?= $row['alamat'] ?>
                    </td>
                    <td>
                        <?= $row['hp'] ?>
                    </td>
                    <td>
                        <?= $row['agama'] ?>
                    </td>
                    <td>
                        <?= $row['jk'] ?>
                    </td>
                    <td>
                        <a href="?hal=edit&id=<?= $row['id'] ?>" onclick="return confirm('YAKIN AKAN DIEDIT?')"
                            class="btn-edit"></a> &nbsp;
                        <a href="?hal=tampil&id=<?= $row['id'] ?>" onclick="return confirm('YAKIN AKAN DIHAPUS?')"
                            class="btn-delete"></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
</body>

</html>