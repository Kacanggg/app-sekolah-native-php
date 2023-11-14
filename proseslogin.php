<?php 
session_start();
require_once("function.php");
if(isset($_POST["login"])){
    extract($_POST);
    $user = mysqli_query($conn,"SELECT * FROM tbuser WHERE username='$username'");
    $row = mysqli_fetch_array($user);
    if(password_verify($password, $row["password"])){
        $_SESSION["username"] = $row["username"];
        $_SESSION["nama_user"] = $row["nama_user"];
        $_SESSION["iduser"] = $row["iduser"];
        header("location:index.php");
    }else{
        header("location:login.php");
    }
}
?>