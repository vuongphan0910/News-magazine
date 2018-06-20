<div class="col-lg-4 col-md-4 col-sm-4">
  <div class="latest_post">
    <h2><span>Tin Xem Nhiều</span></h2>
    <div class="latest_post_container">
      <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
      <ul class="latest_postnav">
        <?php $kq=$t->TinXN();
        while ($txn=$kq->fetch_array()) {
         ?>
         <li>
          <div class="media"> <a href="news/<?=$txn['TieuDe_KhongDau']?>.chn" class="media-left"> <img alt="" src="<?=$txn['urlHinh']?>" onerror="this.src='images/post_img1.jpg'"></a>
            <div class="media-body"> <a href="news/<?=$txn['TieuDe_KhongDau']?>.chn" class="catg_title"><?=$txn['TieuDe']?></a> </div>
          </div>
        </li>  
      <?php } ?>        
    </ul>
    <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
  </div>
</div>
</div>