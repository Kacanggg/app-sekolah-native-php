<?php
require_once "function.php";
$user = mysqli_query($conn, "SELECT * FROM tbuser ORDER BY nama_user DESC");
$id = isset($_GET["id"]) ? ($_GET["id"]) : "";
if ($id != "") {
    $del = mysqli_query($conn, "DELETE FROM tbuser WHERE iduser=$id");
    if ($del) {
        echo "<script>alert('HAPUS BERHASIL');location.href='?hal=tampiluser';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style2.css" />
    <title>Tampil User</title>
</head>

<body>
    <h1 class="judul">DATA USER</h1>
    <center>
        <a class="link" href="?hal=tambahuser">Tambahkan</a>
        <br>
        <br>
        <table border="1" cellpadding="8" cellspacing="0" class="table">
            <tr>
                <th>NO</th>
                <th>NAMA</th>
                <th>USERNAME</th>
                <th>AKSI</th>
            </tr>
            <?php
            $no = 1;
            foreach ($user as $row): ?>
                <tr>
                    <td>
                        <?= $no++ ?>
                    </td>
                    <td>
                        <?= $row['nama_user'] ?>
                    </td>
                    <td>
                        <?= $row['username'] ?>
                    </td>
                    <td>
                        <a href="?hal=edituser&id=<?= $row['iduser'] ?>" onclick="return confirm('YAKIN AKAN DIEDIT?')"
                            class="btn-edit"></a> &nbsp;
                        <a href="?hal=tampiluser&id=<?= $row['iduser'] ?>" onclick="return confirm('YAKIN AKAN DIHAPUS?')"
                            class="btn-delete"></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </center>
</body>

</html>