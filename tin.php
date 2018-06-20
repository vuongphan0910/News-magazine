  <section id="sliderSection">
    <?php include 'top_tinmoi.php'; ?>
  </section>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
         <?php $kq=$t->TheLoai();
         while ($rowTL=$kq->fetch_array()) {
          ?>
          <div class="single_post_content">
            <h2><span><?=$rowTL['TenTL']?></span></h2>
            <div class="single_post_content_left">
             <?php $tl=$t->TinTrongTL($rowTL['idTL']);
             $rowT=$tl->fetch_array();
             ?>
             <ul class="business_catgnav  wow fadeInDown">
              <li>
                <figure class="bsbig_fig"> <a href="index.php?p=chitiettin&idTin=<?=$rowT['idTin']?>" class="featured_img"> <img alt="" src="<?=$rowT['urlHinh']?>" onerror="this.src='images/featured_img3.jpg'> <span class="overlay"></span> </a>
                  <figcaption> <a href="news/<?=$rowT['TieuDe_KhongDau']?>.chn"><?=$rowT['TieuDe']?></a> </figcaption>
                  <p><?=$rowT['TomTat']?></p>
                </figure>
              </li>
            </ul>
          </div>
          <div class="single_post_content_right">
            <ul class="spost_nav">
             <?php while ($rowT=$tl->fetch_array()) {?>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="<?=$rowT['urlHinh']?>" onerror="this.src='images/photograph_img3.jpg'"> </a>
                  <div class="media-body"> <a href="news/<?=$rowT['TieuDe_KhongDau']?>.chn" class="catg_title"><?=$rowT['TieuDe']?></a> </div>
                </div>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
<?php include 'right_content.php'; ?>
</section>