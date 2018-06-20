<?php
include_once "libraries/classTin.php";
$t=new Tin; 
$kq=$t->TinMoi(5);
?>
<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8">
    <div class="slick_slider">
      <?php while($rtin=$kq->fetch_array()) {?>
        <div class="single_iteam"> <a href="news/<?=$rtin['TieuDe_KhongDau']?>.chn"> <img src="<?=$rtin['urlHinh']?>" alt=""></a>
          <div class="slider_article">
            <h2><a class="slider_tittle" href="news/<?=$rtin['TieuDe_KhongDau']?>.chn"><?=$rtin['TieuDe']?></a></h2>
            <p><?=$rtin['TomTat']?></p>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <?php include 'tinxn.php'; ?>
</div>