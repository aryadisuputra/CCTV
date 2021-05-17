<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>404 Page not found</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../node_modules/admin-lte/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet"
            href="../../node_modules/admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="../../node_modules/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="../../node_modules/admin-lte/plugins/jqvmap/jqvmap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../node_modules/admin-lte/dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet"
            href="../../node_modules/admin-lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="../../node_modules/admin-lte/plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="../../node_modules/admin-lte/plugins/summernote/summernote-bs4.min.css">
    </head>
</head>

<body>
<?php session_start();?>
<div class="align-items-center m-5 p-5">
<section class="content">
        <div class="error-page">
            <h2 class="headline text-warning"> 404</h2>

            <div class="error-content">
                <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

                <p>
                    We could not find the page you were looking for.
                    Meanwhile, you may <a 
                    <?php if ($_SESSION['level']=="Admin"||$_SESSION['level']=="Pimpinan")
                        {
                            echo 'href="../dashboard/halaman_admin.php"';
                        }else if($_SESSION['level']=="Staff"){
                            echo 'href="../dashboard/halaman_pegawai.php"';
                        }

                    
                    ?>>return to dashboard</a>
                </p>

            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>
</div>

</body>

</html>