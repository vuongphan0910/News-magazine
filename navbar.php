<?php 
  $kq=$t->TheLoai();
 ?>
 <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav main_nav">
          <li class="active"><a href="index.php"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
          <?php while ($rowTL=$kq->fetch_array()) { ?>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?=$rowTL['TenTL']?></a>
            <ul class="dropdown-menu" role="menu">
              <?php $lt=$t->LoaiTinTrongTL($rowTL['idTL']);
                    while($rlt=$lt->fetch_array()){
               ?>
              <li><a href="cate/<?=$rlt['Ten_KhongDau']?>/"><?=$rlt['Ten']?></a></li>
            <?php }?>
            </ul>
          </li> 
        <?php } ?>
        </ul>
      </div>