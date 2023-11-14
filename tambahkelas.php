<?php
require_once 'function.php';
if (isset($_POST['tambah'])) {
    extract($_POST);
    $ins = mysqli_query($conn, "INSERT INTO tbkelas VALUE(null,'$nama_kelas','$jurusan')");
    if ($ins) {
        echo "<script>alert('TAMBAH BERHASIL');location.href='?hal=tampilkelas';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style3.css" />
    <title>Tambah Kelas</title>
</head>

<body>
    <div class="box">
        <center>
            <a href="?hal=tampilkelas">Kembali Ke Data Kelas</a>
        </center>
        <br>
        <br>
        <form action="?hal=tambahkelas" method="post">
            <table>
                <tr>
                    <td>Kelas</td>
                    <td>:&nbsp;<input type="text" name="nama_kelas" placeholder="Nama Kelas" maxlength="20" autofocus>
                    </td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td>:
                        <select name="jurusan">
                            <option value="">==pilih jurusan==</option>
                            <option value="Rekayasa Perangkat Lunak">RPL</option>
                            <option value="Bisnis Digital">BD</option>
                            <option value="Akutansi">AK</option>
                            <option value="Manajement Perkantoran">MP</option>
                            <option value="Desain Komunikasi Visual">DKV</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><button type="submit" name="tambah" value="tambah">Simpan</button></td>
                    <td><button type="reset" name="reset">Reset</button></td>
                </tr>
            </table>
        </form>
</body>

</html>