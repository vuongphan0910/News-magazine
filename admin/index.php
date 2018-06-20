<?php 
session_start();
ob_start();
require_once "libraries/classquantritin.php";
$qt=new quantritin;
if(isset($_COOKIE['gr'])){
    $_SESSION['login_group']=$_COOKIE['gr'];
    $_SESSION['login_user']=$_COOKIE['un'];
    $_SESSION['login_hoten']=$_COOKIE['ht'];
    $_SESSION['login_email']=$_COOKIE['em'];
    $_SESSION['login_active']=$_COOKIE['active'];
}
$qt->checkLogin();
 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Quản Trị Website Tin Tức</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
    <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>
<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
      <?php include_once "nav_bar.php" ?>
  </nav>
  <!-- #Top Bar -->
  <section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <?php include_once "user_menu.php" ?>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <?php include_once "menu.php"; ?>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.5
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <?php include_once "top_menu.php" ?>
    <!-- #END# Right Sidebar -->
</section>

<section class="content">
   <?php 
   if(isset($_GET['p'])){
     $p=$_GET['p'];
     switch($p){
       case "theloai_add": include_once "theloai_add.php" ; break;
       case "theloai_list": include_once "theloai_list.php" ; break;
       case "theloai_edit": include_once "theloai_edit.php" ; break;
       case "theloai_delete": include_once "theloai_delete.php" ; break;
       case "loaitin_add": include_once "loaitin_add.php" ; break;
       case "loaitin_list": include_once "loaitin_list.php" ; break;
       case "loaitin_edit": include_once "loaitin_edit.php" ; break;
       case "loaitin_delete": include_once "loaitin_del.php" ; break;
       case "tin_list": include_once "tintuc_list.php" ; break;
       case "tintuc_del": include_once "tintuc_del.php" ; break;
       case "tintuc_add": include_once "tintuc_add.php" ; break;
       case "tintuc_edit": include_once "tintuc_edit.php" ; break;
       case "bl_list": include_once "bl_list.php" ; break;
       case "bl_del": include_once "bl_delete.php" ; break;
       case "bl_edit": include_once "bl_edit.php" ; break;
       case "user_list": include_once "user_list.php" ; break;
       case "user_del": include_once "user_del.php" ; break;
   }
}else include_once "tintuc_list.php" ;
?>
</section>
<!-- Jquery Core Js -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap Core Js -->
<script src="plugins/bootstrap/js/bootstrap.js"></script>
<!-- Select Plugin Js -->
<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>
<!-- Slimscroll Plugin Js -->
<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>
<script src="plugins/ckeditor/ckeditor.js"></script>
<script src="plugins/ckfinder/ckfinder.js"></script>
<!-- JQuery DataTable Css -->
<link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
<!-- Jquery DataTable Plugin Js -->
<script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/tables/jquery-datatable.js"></script>
<!-- Demo Js -->
<script src="js/demo.js"></script>
<script>
   function selectFileWithCKFinder( elementId ) {

    CKFinder.popup( {
        chooseFiles: true,
        width: 800,
        height: 600,
        onInit: function( finder ) {
            finder.on( 'files:choose', function( evt ) {
                var file = evt.data.files.first();
                var output = document.getElementById( elementId );
                output.value = file.getUrl();
            } );

            finder.on( 'file:choose:resizedImage', function( evt ) {
                var output = document.getElementById( elementId );
                output.value = evt.data.resizedUrl;
            } );
        }
    } );
}
</script>   
</body>
</html>