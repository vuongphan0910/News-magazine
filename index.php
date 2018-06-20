<?php 
include "libraries/classTin.php";
$t=new Tin;
if(isset($_GET['p']))
$p=$_GET['p'];
else
$p=''; 
?>
<!DOCTYPE html>
<html>
<head>
  <title><?=$t->getTitle($p)?></title>
  <base href="http://localhost/Tapchi/">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
  <link rel="stylesheet" type="text/css" href="assets/css/font.css">
  <link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
  <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
  <link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css">
  <link rel="stylesheet" type="text/css" href="assets/css/theme.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body>
  <!-- <div id="preloader">
    <div id="status">&nbsp;</div>
  </div> -->
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
  <div class="container">
    <?php include "header.php" ?>
    <section id="navArea">
      <nav class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <?php include 'navbar.php'; ?>
      </nav>
    </section>
    <section id="newsSection">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <?php include 'slide_tinmoi.php'; ?>
        </div>
      </div>
    </section>
    <?php 
      switch ($p) {
        case 'chitiettin':
        include 'chitiettin.php';
        break;
        case 'tintrongloai':
        include 'tintrongloai.php';
        break;
        default:include 'tin.php';
      } ?>
    <footer id="footer">
      <div class="footer_top">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="footer_widget wow fadeInLeftBig">
              <h2>Flickr Images</h2>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="footer_widget wow fadeInDown">
              <h2>Tag</h2>
              <ul class="tag_nav">
                <li><a href="#">Games</a></li>
                <li><a href="#">Sports</a></li>
                <li><a href="#">Fashion</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Life &amp; Style</a></li>
                <li><a href="#">Technology</a></li>
                <li><a href="#">Photo</a></li>
                <li><a href="#">Slider</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="footer_widget wow fadeInRightBig">
              <h2>Liên Hệ </h2>
              <p>Địa chỉ : số 123 đường abc  , phường xyz ,TP.HCM .</p>
              <address>
               Số ĐT: 012 345 6789 .
              </address>
            </div>
          </div>
        </div>
      </div>
      <div class="footer_bottom"> 
        <p class="developer">Developed By Phan Quốc Vương</p>
      </div>
    </footer>
  </div>
  <script src="assets/js/jquery.min.js"></script> 
  <script src="assets/js/wow.min.js"></script> 
  <script src="assets/js/bootstrap.min.js"></script> 
  <script src="assets/js/slick.min.js"></script> 
  <script src="assets/js/jquery.li-scroller.1.0.js"></script> 
  <script src="assets/js/jquery.newsTicker.min.js"></script> 
  <script src="assets/js/jquery.fancybox.pack.js"></script> 
  <script src="assets/js/custom.js"></script>
</body>
</html>