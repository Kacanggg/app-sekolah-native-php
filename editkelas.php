<?php 
require_once 'function.php';
if(isset($_POST['update'])){
    extract($_POST);
    $upd = mysqli_query($conn, "UPDATE tbkelas SET nama_kelas='$nama_kelas', jurusan='$jurusan' WHERE id=$id");
    if($upd){
        echo "<script>alert('UPDATE BERHASIL');location.href='?hal=tampilkelas';</script>";
    }else{
        echo "<script>alert('UPDATE GAGAL');location.href='?hal=tampilkelas';</script>";
    }
}
$id = isset($_GET['id'])?$_GET['id']:"";
if($id == ""){
        echo "<script>alert('DATA TIDAK DITTEMUKAN');location.href='?hal=tampilkelas';</script>";
    }else{
        $query = mysqli_query($conn, "SELECT * FROM tbkelas WHERE id=$id");
        $row = mysqli_fetch_array($query);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styles.css" />
    <title>Edit Data Kelas</title>
</head>
<body class="back">
    <div class="navbar">
    <a href="?hal=tampilkelas">Kembali Ke Data Kelas</a>
    <br>
    <br>
    <form action="?hal=editkelas" method="post">
        <table>
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <tr>
                <td><label for="nama_kelas">Kelas</label></td>
                <td>:&nbsp;<input type="text" name="nama_kelas" placeholder="Nama Kelas" value="<?= $row['nama_kelas']?>"></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>:&nbsp;
                    <select name="jurusan">
                        <option <?= $row['jurusan']=="Rekayasa Perangkat Lunak"?'selected':'' ?>value="Rekayasa Perangkat Lunak">RPL</option>
                        <option <?= $row['jurusan']=="Bisnis Digital"?'selected':'' ?>value="Bisnis Digital">BD</option>
                        <option <?= $row['jurusan']=="Akutansi"?'selected':'' ?>value="Akutansi">AK</option>
                        <option <?= $row['jurusan']=="Manajement Perkantoran"?'selected':'' ?>value="Manajement Perkantoran">MP</option>
                        <option <?= $row['jurusan']=="Desain Komunikasi Visual"?'selected':'' ?>value="Desain Komunikasi Visual">DKV </option>
                    </select>
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