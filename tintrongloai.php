<?php include_once "libraries/classTin.php";
$t=new Tin;
if(isset($_GET['Ten_KhongDau']))
  $Ten_KhongDau=$_GET['Ten_KhongDau'];
$idLT=$t->LayidLT_tin($Ten_KhongDau);
if(isset($_GET['page']))
  $page=$_GET['page'];
else  
  $page=1;
$limit=6;
$td=0;
$tin=$t->TinTrongLoai($idLT,$page,$td,$limit);
$tp=ceil($td/$limit);
$lt=$t->chitietLT($idLT);
$rowLT=$lt->fetch_array();
?>
<section id="contentSection">
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8">
      <div class="left_content">
        <div class="single_post_content">
          <h2><span><?=$rowLT['Ten']?></span></h2>
          <?php while ($rowTin=$tin->fetch_array()) {?>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                <li>
                  <figure class="bsbig_fig"> <a href="news/<?=$rowTin['TieuDe_KhongDau']?>.chn" class="featured_img"> <img alt="" src="<?=$rowTin['urlHinh']?>" onerror="this.src='images/featured_img1.jpg'"> <span class="overlay"></span> </a>
                    <figcaption> <a href="news/<?=$rowTin['TieuDe_KhongDau']?>.chn"><?=$rowTin['TieuDe']?></a> </figcaption>
                    <p><?=$rowTin['TomTat']?></p>
                  </figure>
                </li>
              </ul>
            </div>
          <?php } ?>
        </div>
        <ul class="pagination">.
          <?php for($i=1;$i<=$tp;$i++){?>
            <li  <?php if($i==$page) echo "class='active'"?> ><a href="cate/<?=$Ten_KhongDau?>/<?=$i?>/"><?=$i?></a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
    <?php include 'right_content.php'; ?>
  </div>
</section>