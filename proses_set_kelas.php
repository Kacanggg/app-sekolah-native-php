<?php
require_once 'function.php';
if (isset($_POST['tambah'])) {
    extract($_POST);
    foreach ($siswa as $id) {
        mysqli_query($conn, "INSERT INTO tbsetkelas VALUES(null,'$id','$kelas','$tahun')");
    }
    echo "<script>alert('PROSES BERHASIL');location.href='?hal=setkelas';</script>";
}
?>