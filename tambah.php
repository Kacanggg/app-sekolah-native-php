<?php
require_once 'function.php';
if (isset($_POST['tambah'])) {
    extract($_POST);
    $ins = mysqli_query($conn, "INSERT INTO tbsiswa VALUE(null,'$nis','$nisn','$nama_siswa','$alamat','$hp','$agama','$jk')");
    if ($ins) {
        echo "<script>alert('TAMBAH BERHASIL');location.href='?hal=tampil';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css" />
    <title>Tambah Siswa</title>
</head>

<body>
    <div class="posisi">
        <a href="?hal=tampil">Kembali Ke Data Siswa</a>
        <br>
        <br>
        <form action="?hal=tambah" method="post">
            <table>
                <tr>
                    <td>NIS</td>
                    <td>:&nbsp;<input type="text" name="nis" placeholder="Nomer Induk Siswa" maxlength="20" autofocus>
                    </td>
                </tr>
                <tr>
                    <td>NISN</td>
                    <td>:&nbsp;<input type="text" name="nisn" placeholder="Nomer Induk Siswa Nasional" maxlength="10">
                    </td>
                </tr>
                <tr>
                    <td>Nama Siswa</td>
                    <td>:&nbsp;<input type="text" name="nama_siswa" placeholder="Nama Siswa" maxlength="50"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:&nbsp;<input type="text" name="alamat" placeholder="Alamat"></td>
                </tr>
                <tr>
                    <td>HP</td>
                    <td>:&nbsp;<input type="text" name="hp" placeholder="Nomer HP" maxlength="15"></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:&nbsp;
                        <select name="agama">
                            <option value="">==pilih agama==</option>
                            <option value="islam">Islam</option>
                            <option value="kristen">Kristen</option>
                            <option value="katholik">Katholik</option>
                            <option value="hindu">Hindu</option>
                            <option value="budha">Budha</option>
                            <option value="konghucu">Konghucu</option>
                        </select>
                    </td>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>
                        <input type="radio" name="jk" value="Laki-Laki">Laki-Laki
                        <input type="radio" name="jk" value="Perempuan">Perempuan
                    </td>
                </tr>
                <tr>
                    <td><button type="submit" name="tambah" value="tambah">Simpan</button></td>
                    <td><button type="reset" name="reset">Reset</button></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>