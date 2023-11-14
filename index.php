<?php 
session_start();
if(empty($_SESSION["username"])){
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styles.css" />
    <title>Index</title>
</head>
<body class="bg">
<div class="sidebar">
<button class="close-btn" onclick="closeSidebar()">&times;</button>
<h2>DATA</h2>
    <ul>
        <li><a href="?hal=tampil">Data Siswa</a></li>
        <li><a href="?hal=tampilkelas">Data Kelas</a></li>
        <li><a href="?hal=setkelas">Setting Kelas</a></li>
        <li><a href="?hal=presensi">Cetak Presensi</a></li>
        <li><a href="?hal=tampiluser">Pengguna</a></li>
        <li><a href="?hal=logout">Log Out</a></li>
    </ul>
</div>
<div class="content">
<button class="open-btn" onclick="openSidebar()">
        &#9776;
      </button>
<?php 
        $hal = isset($_GET['hal'])?$_GET['hal']:"";
        if($hal!=""){
            include_once("$hal".".php");
        }
    ?>
    </div>
</div>
<script src="style/script.js"></script>
</body>
</html>
