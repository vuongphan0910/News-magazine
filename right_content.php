 <div class="col-lg-4 col-md-4 col-sm-4">
  <aside class="right_content">
    <div class="single_sidebar">
      <h2><span>Tin Nổi Bật</span></h2>
      <ul class="spost_nav">
       <?php $kq=$t->TinNoiBat();
       while ($tnb=$kq->fetch_array())
         { ?>
          <li>
            <div class="media wow fadeInDown"> <a href="news/<?=$tnb['TieuDe_KhongDau']?>.chn" class="media-left"> <img alt="" src="<?=$tnb['urlHinh']?>" onerror="this.src='images/post_img1.jpg'"> </a>
              <div class="media-body"> <a href="news/<?=$tnb['TieuDe_KhongDau']?>.chn" class="catg_title"><?=$tnb['TieuDe']?></a> </div>
            </div>
          </li>
        <?php } ?>
      </ul>
    </div>
    <div class="single_sidebar">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Thể Loại</a></li>
        <li role="presentation"><a href="#video" aria-controls="profile" role="tab" data-toggle="tab">Video</a></li>
        <li></li>
      </ul>
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="category">
          <ul>
           <?php $kq=$t->TheLoai();
           while ($rowTL=$kq->fetch_array()) {
            ?>
            <li class="cat-item"><a href="#"><?=$rowTL['TenTL']?></a></li>
          <?php } ?>
        </ul>
      </div>
      <div role="tabpanel" class="tab-pane" id="video">
        <div class="vide_area">
          <iframe width="100%" height="250" src="http://www.youtube.com/embed/h5QWbURNEpA?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
        </div>
      </div> 
    </div>
  </div> 
  <div class="single_sidebar wow fadeInDown">
    <h2><span>Links</span></h2>
    <ul>
      <li><a href="#">Blog</a></li>
      <li><a href="#">Rss Feed</a></li>
      <li><a href="#">Login</a></li>
    </ul>
  </div>
</aside>
</div>
</div>