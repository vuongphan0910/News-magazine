<?php 
  $kq=$t->TinMoi(9);
 ?>
<div class="latest_newsarea"> <span>Tin mới</span>
  <ul id="ticker01" class="news_sticker">
    <?php while ($t=$kq->fetch_array()) {?>
    <li><a href="news/<?=$t['TieuDe_KhongDau']?>.chn"><img src="<?=$t['urlHinh']?>" alt="" ><?=$t['TieuDe']?></a></li>
  <?php } ?>
  </ul>
  <div class="social_area">
    <ul class="social_nav">
      <li class="facebook"><a href="#"></a></li>
      <li class="twitter"><a href="#"></a></li>
      <li class="flickr"><a href="#"></a></li>
      <li class="pinterest"><a href="#"></a></li>
      <li class="googleplus"><a href="#"></a></li>
      <li class="vimeo"><a href="#"></a></li>
      <li class="youtube"><a href="#"></a></li>
      <li class="mail"><a href="#"></a></li>
    </ul>
  </div>
</div>