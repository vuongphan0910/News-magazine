 <?php include_once "libraries/classTin.php";
 $t=new Tin;
 if(isset($_GET['TieuDe_KhongDau']))
  $TieuDe_KhongDau=$_GET['TieuDe_KhongDau'];
$idTin=$t->LayidTin($TieuDe_KhongDau);
$kq=$t->ChiTiet_Tin($idTin);
$rowTin=$kq->fetch_array();
if(isset($_POST['btn_bl']))
{
  $t->add_bl($idTin);
  echo "<script> alert('Bình luận của bạn đã được gửi đi và đang đợi duyệt');</script>" ;
}
?>
<section id="contentSection">
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8">
      <div class="left_content">
        <div class="single_page">
          <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="#"><?=$rowTin['TenTL']?></a></li>
            <li class="active"><?=$rowTin['Ten']?></li>
          </ol>
          <h1><?=$rowTin['TieuDe']?></h1>
          <div class="post_commentbox"><i class="fa fa-calendar"></i><?=date('d-m-Y h:m a',strtotime($rowTin['Ngay']))?></span> <a href="#"><i class="fa fa-tags"></i><?=$rowTin['TenTL']?></a> </div>
          <div class="single_page_content"> <img class="img-center" src="<?=$rowTin['urlHinh']?>" alt="">
            <blockquote><?=$rowTin['TomTat']?></blockquote>
            <p><?=$rowTin['ConTent']?></p>
          </div>
          <div class="contact_area">
            <h2>Bình Luận</h2>
            <div id="bl">
              <?php $rowBL=$t->Lay_BL($idTin);
              while ($bl=$rowBL->fetch_array()) {
               ?>
               <div class="nd">
                 <p><?=$bl['HoTen']?> (<?=date('d-m-Y ',strtotime($bl['Ngay']))?>)</p>
                 <p>-<?=$bl['NoiDung']?></p>
               </div>
             <?php } ?>
           </div>
           <form action="" class="contact_form" method="post">
            <input type="hidden" name="idTin" value="<?=$idTin?>">
            <input class="form-control" type="text" placeholder="Nhập họ tên" name="hoten" required>
            <input class="form-control" type="email" placeholder="Nhập email" name="email" required>
            <textarea class="form-control" cols="30" rows="10" name="noidung" placeholder="nội dung bình luận" required></textarea>
            <input type="submit" value="Gửi" name="btn_bl">
          </form>
        </div>
        <div class="related_post">
          <h2>Tin Cùng Loại<i class=""></i></h2>
          <ul class="spost_nav wow fadeInDown animated">
            <?php 
            $idLT=$rowTin['idLT'];
            $older=$t->TinOlder($idTin,$idLT);
            while($r=$older->fetch_array()){
             ?>
             <li>
              <div class="media"> <a class="media-left" href="news/<?=$r['TieuDe_KhongDau']?>.chn"> <img src="<?=$r['urlHinh']?>" alt="" onerror="this.src='images/post_img2.jpg'"> </a>
                <div class="media-body"> <a class="catg_title" href="news/<?=$r['TieuDe_KhongDau']?>.chn"><?=$r['TieuDe']?></a> </div>
              </div>
            </li>
          <?php } ?>
        </li>
      </ul>
    </div>
  </div>
</div>
</div>
<nav class="nav-slit"> <a class="prev" href="#"> <span class="icon-wrap"><i class="fa fa-angle-left"></i></span>
  <div>
    <h3>City Lights</h3>
    <img src="../images/post_img1.jpg" alt=""/> </div>
  </a> <a class="next" href="#"> <span class="icon-wrap"><i class="fa fa-angle-right"></i></span>
    <div>
      <h3>Street Hills</h3>
      <img src="../images/post_img1.jpg" alt=""/> </div>
    </a> </nav>
    <?php include 'right_content.php'; ?>
  </div>
</section>