<?php
require_once 'function.php';

$sql = mysqli_query($conn, "SELECT * FROM tbsiswa WHERE id NOT IN (SELECT idsiswa FROM tbsetkelas WHERE tahun = '2024/2025')");
$kelas = mysqli_query($conn, "SELECT * FROM tbkelas ORDER BY nama_kelas ASC");
$setkelas = mysqli_query($conn, "SELECT a.nama_siswa, b.nama_kelas, c.tahun FROM tbsiswa a, tbkelas b, tbsetkelas c WHERE a.id=c.idsiswa AND b.id=c.idkelas ORDER BY b.nama_kelas, a.nama_siswa ASC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style3.css" />
    <title>Setting Kelas</title>
</head>

<body>
    <div style="width: 48%; min-height: 300px; float: right; padding-right: 5px; padding: 10px;">
        <br><br>
        <h3 style="color: green;">Siswa Sudah Punya Kelas</h3>
        <table border="1" width="100%" cellspacing="0" cellpadding="0">
            <tr>
                <th>Kelas</th>
                <th>Nama Siswa</th>
                <th>Tahun</th>
            </tr>
            <?php
            foreach ($setkelas as $row): ?>
                <tr>
                    <td>
                        <?= $row['nama_kelas'] ?>
                    </td>
                    <td>
                        <?= $row['nama_siswa'] ?>
                    </td>
                    <td>
                        <?= $row['tahun'] ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div style="width: 48%; min-height: 300px; float: right; padding-right: 5px; padding: 10px;">
        <br>
        <h3 style="color: red;">Siswa Belum Punya Kelas</h3>
        <form action="?hal=proses_set_kelas" method="post">
            <table>
                <?php
                foreach ($sql as $row): ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="siswa[<?= $row['id'] ?>]" value="<?= $row['id'] ?>">
                        </td>
                        <td>
                            <?= $row['nama_siswa'] ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <table>
                <tr>
                    <td>
                        <select name="kelas" required>
                            <option value="">==pilih kelas==</option>
                            <?php foreach ($kelas as $row):
                                echo "<option value='$row[id]'>$row[nama_kelas]</option>";
                            endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <select name="tahun" required>
                            <option value="">==pilih tahun==</option>
                            <option value="2023/2024">2023/2024</option>
                            <option value="2024/2025">2024/2025</option>
                            <option value="2025/2026">2025/2026</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="tambah">Tambahkan</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>