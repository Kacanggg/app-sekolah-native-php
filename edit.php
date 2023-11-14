<?php 
require_once 'function.php';
if(isset($_POST['update'])){
    extract($_POST);
    $upd = mysqli_query($conn, "UPDATE tbsiswa SET nis='$nis', nisn='$nisn', nama_siswa='$nama_siswa', alamat='$alamat', hp='$hp', agama='$agama', jk='$jk' WHERE id='$id'");
    if($upd){
        echo "<script>alert('UPDATE BERHASIL');location.href='?hal=tampil';</script>";
    }else{
        echo "<script>alert('UPDATE GAGAL');location.href='?hal=tampil';</script>";
    }
}
$id = isset($_GET['id'])?$_GET['id']:"";
if($id == ""){
        echo "<script>alert('DATA TIDAK DITEMUKAN');location.href='?hal=tampil';</script>";
    }else{
        $query = mysqli_query($conn, "SELECT * FROM tbsiswa WHERE id=$id");
        $row = mysqli_fetch_array($query);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styles.css" />
    <title>Edit Data Siswa</title>
</head>
<body class="back">
    <div class="navbar">
    <a href="?hal=tampil">Kembali Ke Data Siswa</a>
    <br>
    <br>
    <form action="?hal=edit" method="post">
        <table>
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <tr>
                <td><label for="nis">NIS</label></td>
                <td>:&nbsp;<input type="text" name="nis" placeholder="Nomer Induk Siswa" value="<?= $row['nis']?>"></td>
            </tr>
            <tr>
                <td><label for="nisn">NISN</label></td>
                <td>:&nbsp;<input type="text" name="nisn" placeholder="Nomer Induk Siswa Nasional" value="<?= $row['nisn']?>"></td>
            </tr>
            <tr>
                <td><label for="nama">Nama Siswa</label></td>
                <td>:&nbsp;<input type="text" name="nama_siswa" placeholder="Nama Siswa" value="<?= $row['nama_siswa']?>"></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat</label></td>
                <td>:&nbsp;<input type="text" name="alamat" placeholder="Alamat" value="<?= $row['alamat']?>"></td>
            </tr>
            <tr>
                <td><label for="hp">HP</label></td>
                <td>:&nbsp;<input type="text" name="hp" placeholder="Nomer HP" value="<?= $row['hp']?>"></td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:&nbsp;
                    <select name="agama">
                        <option <?= $row['agama']=='Islam'?'selected':'' ?>value="Islam">Islam</option>
                        <option <?= $row['agama']=='Kisten'?'selected':'' ?>value="kristen">Kristen</option>
                        <option <?= $row['agama']=='Katholik'?'selected':'' ?>value="Katholik">Katholik</option>
                        <option <?= $row['agama']=='Hindu'?'selected':'' ?>value="Hindu">Hindu</option>
                        <option <?= $row['agama']=='Budha'?'selected':'' ?>value="Budha">Budha</option>
                        <option <?= $row['agama']=='Konghucu'?'selected':'' ?>value="Konghucu">Konghucu</option>
                    </select>
                </td>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>
                        <input <?= $row['jk']=='Laki-Laki'?'checked':'' ?> type="radio" name="jk" value="Laki-Laki">Laki-Laki
                        <input <?= $row['jk']=='Perempuan'?'checked':'' ?> type="radio" name="jk" value="Perempuan">Perempuan
                    </td>
                </tr>
                <tr>
                    <td><button type="submit" name="update">Update</button></td>
                    <td></td>
                </tr>
        </table>
    </form>
</div>
</body>
</html>