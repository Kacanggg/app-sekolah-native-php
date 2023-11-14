<?php
require_once 'function.php';
$id = isset($_GET['id']) ? $_GET['id'] : "";
if ($id != "") {
    $del = mysqli_query($conn, "DELETE FROM tbkelas WHERE id=$id");
    if ($del) {
        echo "<script>alert('HAPUS BERHASIL');location.href='?hal=tampilkelas';</script>";
    }
}
$data = mysqli_query($conn, "SELECT * FROM tbkelas ORDER BY nama_kelas DESC, jurusan DESC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style2.css" />
    <title>Tampil Kelas</title>
</head>

<body>
    <h1 class="judul">DATA KELAS</h1>
    <center>
        <a class="link" href="?hal=tambahkelas" class="a">Tambah Data</a>
        <br><br>
        <table border="1" cellpadding="8" cellspacing="0" class="table">
            <tr>
                <th>NO</th>
                <th>KELAS</th>
                <th>JURUSAN</th>
                <th>AKSI</th>
            </tr>
            <?php
            $no = 1;
            foreach ($data as $row): ?>
                <tr>
                    <td class="td">
                        <?= $no++ ?>
                    </td>
                    <td class="td">
                        <?= $row['nama_kelas'] ?>
                    </td>
                    <td>
                        <?= $row['jurusan'] ?>
                    </td>
                    <td>
                        <a href="?hal=editkelas&id=<?= $row['id'] ?>" onclick="return confirm('YAKIN AKAN DIEDIT?')"
                            class="btn-edit"></a> &nbsp;
                        <a href="?hal=tampilkelas&id=<?= $row['id'] ?>" onclick="return confirm('YAKIN AKAN DIHAPUS?')"
                            class="btn-delete"></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
</body>

</html>