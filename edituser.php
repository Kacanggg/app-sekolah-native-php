<?php
require_once 'function.php';
$id = isset($_GET['id']) ? ($_GET['id']) : "";
if ($id != "") {
    $sel = mysqli_query($conn, "SELECT * FROM tbuser WHERE iduser=$id");
    $row = mysqli_fetch_array($sel);
}
if (isset($_POST['update'])) {
    extract($_POST);
    if ($password1 != "" && $password2 != "") {
        if ($password1 == $password2) {
            $pass = password_hash($password1, PASSWORD_DEFAULT);
            $upd = mysqli_query($conn, "update tbuser SET nama_user='$nama', username='$username', password='$pass' WHERE iduser='$iduser'");
        } else {
            echo "<script>alert('UPDATE GAGAL, DATA TIDAK SAMA');location.href='?hal=tampiluser';</script>";
        }
    } else {
        $upd = mysqli_query($conn, "UPDATE tbuser SET nama_user='$nama', username='$username' WHERE iduser='$iduser'");
    }
    if ($upd) {
        echo "<script>alert('UPDATE BERHASIL');location.href='?hal=tampiluser';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styles.css" />
    <title>Edit Data User</title>
</head>

<body class="back">
    <div class="navbar">
        <a href="?hal=tampiluser">Kembali Ke Data User</a>
        <br>
        <br>
        <form action="?hal=edituser" method="post">
            <table>
                <input type="hidden" name="id" value="<?= $row['iduser'] ?>">
                <tr>
                    <td><label for="nama">Nama User</label></td>
                    <td>:&nbsp;<input type="text" name="nama" placeholder="Nama User" value="<?= $row['nama_user'] ?>">
                    </td>
                </tr>
                <tr>
                    <td><label for="username">Username</label></td>
                    <td>:&nbsp;<input type="text" name="username" placeholder="Username" value="<?= $row['username'] ?>">
                    </td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td>:&nbsp;<input type="password" name="password1" placeholder="Password"></td>
                </tr>
                <tr>
                    <td><label for="password">Konfirmasi</label></td>
                    <td>:&nbsp;<input type="password" name="password2" placeholder="Password"></td>
                </tr>
                <tr>
                    <td><button type="submit" name="update">Update</button></td>
                    <td><button type="reset">Reset</button></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>