<?php 
require_once 'function.php';
$tahun = isset($_GET['tahun'])?$_GET['tahun'] :'';
$bulan = isset($_GET['bulan'])?$_GET['bulan'] :'';
$kelas = isset($_GET['kelas'])?$_GET['kelas'] :'';
if($kelas!= "" && $bulan!= "" && $tahun!= ""){
    $ambilkelas = mysqli_query($conn,"SELECT * FROM tbkelas WHERE id=$kelas");
    $datakelas = mysqli_fetch_array($ambilkelas);
    $sql = mysqli_query($conn, "SELECT a.nama_siswa, b.nama_kelas FROM tbsiswa a, tbkelas b, tbsetkelas c WHERE a.id=c.idsiswa AND b.id=c.idkelas AND b.id=$kelas ORDER BY a.nama_siswa ASC");
    $jmlhari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
    $header = "";
    $data = "";
    for($i=1;$i<=$jmlhari;$i++){
        $header =  $header."<th width='2%'>$i</th>";
        $data = $data."<td>&nbsp;</td>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styles.css" />
    <title>Cetak</title>
</head>
<body>
<table class="table">
    <tr>
        <td>Kelas</td>
        <td>:</td>
        <td><?= $datakelas['nama_kelas'] ?></td>
    </tr>
    <tr>
        <td>Bulan</td>
        <td>:</td>
        <td>
            <?php 
                switch($bulan){
                    case 1 :
                        echo "Januari";
                    break;
                    case 2 :
                        echo "Febuari";
                    break;
                    case 3 :
                        echo "Maret";
                    break;
                    case 4 :
                        echo "April";
                    break;
                    case 5 :
                        echo "Mei";
                    break;
                    case 6 :
                        echo "Juni";
                    break;
                    case 7 :
                        echo "Juli";
                    break;
                    case 8 :
                        echo "Agustus";
                    break;
                    case 9 :
                        echo "September";
                    break;
                    case 10 :
                        echo "Oktober";
                    break;
                    case 11 :
                        echo "November";
                    break;
                    case 12 :
                        echo "Desember";
                    break;
                }
            ?>
            <?= $tahun ?>
        </td>
    </tr>
</table>
<table border="1" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th width="2%">NO</th>
        <th width="30%">NAMA SISWA</th>
        <?= $header ?>
    </tr>
    <?php 
        $no = 1;
        foreach($sql as $row) : 
    ?>
    <tr>
        <td align="center"><?= $no++; ?></td>
        <td><?= $row['nama_siswa'] ?></td>
        <?= $data ?>
    </tr>
    <?php endforeach; ?>
</table>
<?php 
    }else{
        echo "DATA TIDAK DAPAT DITAMPILKAN";
    }
?>
<script>
    window.print();
</script>
</body>
</html>