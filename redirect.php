<?php
    session_start();
    if($_SESSION['level']=="Admin"||$_SESSION['level']=="Pimpinan"){
        header("location:view/dashboard/halaman_admin.php");
        exit();
    }else if($_SESSION['level']=="TLC"||$_SESSION['level']=="TL"||$_SESSION['level']=="Staff"){
        header("location:view/dashboard/halaman_pegawai.php");
        exit();
    }
?>