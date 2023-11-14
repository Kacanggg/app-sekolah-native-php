<?php
require_once 'function.php';
if (isset($_POST['tambah'])) {
    extract($_POST);
    if ($password1 == $password2) {
        $pass = password_hash($password1, PASSWORD_DEFAULT);
        $ins = mysqli_query($conn, "INSERT INTO tbuser VALUE(null,'$nama','$username','$pass')");
        if ($ins) {
            echo "<script>alert('TAMBAH BERHASIL');location.href='?hal=tampiluser';</script>";
        }
    } else {
        echo "<script>alert('PASSWORD TIDAK SAMA');location.href='?hal=tampiluser';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styles.css" />
    <title>Tambah User</title>
</head>

<body>
      
    <div class="navbar">
        <a href="?hal=tampiluser">Kembali Ke Data User</a>
        <br>
        <br>
        <form action="?hal=tambahuser" method="post">
            <table>
                <tr>
                    <td>Nama Kelas</td>
                    <td>:&nbsp;<input type="text" name="nama" placeholder="Nama User" required autofocus></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>:&nbsp;<input type="text" name="username" placeholder="Username" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>:&nbsp;<input type="password" name="password1" placeholder="Password" required></td>
                </tr>
                <tr>
                    <td>Konfirmasi</td>
                    <td>:&nbsp;<input type="password" name="password2" placeholder="Password" required></td>
                </tr>
                <tr>
                    <td><button type="submit" name="tambah" value="tambah">Simpan</button></td>
                    <td><button type="reset" name="reset">Reset</button></td>
                </tr>
            </table>
        </form>
</body>

</html>