<?php 
require_once "libraries/classquantritin.php";
$qt=new quantritin;
if(isset($_GET['idTin']))
  $idTin=$_GET['idTin'];
$kq=$qt->Tin_Detail($idTin);
$rowTin=$kq->fetch_array();
if(isset($_POST['btn_addtin']))
{
  $thanhcong=$qt->Tin_edit($idTin,$loi);
  if($thanhcong==true){
    header("location:index.php?p=tin_list");
  }
}
?>
<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="header">
        <h2>Sửa Tin</h2>
        <?php if(isset($loi)&&($loi!=NULL)) { ?>
          <div class="alert alert-danger">
            <strong> Đã Có Lỗi Xảy Ra Khi Thực Hiện Thao Tác,Vui Lòng Kiểm Tra </strong> 
          </div>
        <?php } ?>
      </div>
      <div class="body">
        <form id="form_validation" method="POST" action="" enctype="multipart/form-data">
          <div class="row clearfix ">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"  >
              <select class="form-control show-tick" name="lang" id="lang"  >
               <option value="vi" <?=$rowTin['lang']=='vi'?'selected':''?>>Tiếng Việt</option>
               <option value="en" <?=$rowTin['lang']=='en'?'selected':''?>>English</option>
             </select>
           </div>
           <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"    >
            <div class="form-line" id="idTL">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" id="idLT"  >
          </div>
        </div>
        <div class="form-group form-float">
          <div class="form-line">
            <input type="text" class="form-control" name="tieude" value="<?=$rowTin['TieuDe']?>" required >
            <label class="form-label">Tiêu Đề</label>
          </div>
        </div>
        <div class="form-group form-float">
          <div class="form-line">
            <textarea name="tomtat" cols="80" rows="5" class="form-control" required  ><?=$rowTin['TomTat']?></textarea>
            <label class="form-label">Tóm Tắt</label>
          </div>
        </div>
        <div class="form-group form-float">
          <h5>Hình đại diện</h5>
          <div class="form-line">
            <img src="<?=$rowTin['urlHinh']?>" alt="" >
            <input type="hidden" name="hinh" value="<?=$rowTin['urlHinh']?>" >
          </div>
          <div class="form-group form-float">
            <h5>Thay đổi ảnh đại diện</h5>
            <div class="form-line">
             <input type="file" name="urlHinh" >
           </div>
         </div>
         <div class="form-group form-float">
          <div class="form-line">
            <h4>Nội Dung</h4>
            <b id="kq_sp"style="color: red"><?php if(isset($loi['nd'])) echo $loi['nd']; ?></b>
            <textarea name="noidung" id="ckeditor" cols="30" rows="10" class="form-control" require><?=$rowTin['Content']?></textarea >
          </div>
        </div>
        <div class="form-group">
          <input type="radio" name="AnHien" id="AnHien_0" class="with-gap" value="0"<?=$rowTin['AnHien']==0?'checked':''?>>
          <label for="AnHien_0">Ẩn</label>
          <input type="radio" name="AnHien" id="AnHien_1" class="with-gap" value="1" <?=$rowTin['AnHien']==1?'checked':''?>>
          <label for="AnHien_1" class="m-l-20">Hiện</label>
        </div>
        <div class="form-group">
          <input type="radio" name="NoiBat" id="NoiBat_0" class="with-gap" value="0" <?=$rowTin['TinNoiBat']==0?'checked':''?>>
          <label for="NoiBat_0" >Tin Thường</label>

          <input type="radio" name="NoiBat" id="NoiBat_1" class="with-gap" value="1" <?=$rowTin['TinNoiBat']==1?'checked':''?> >
          <label for="NoiBat_1" class="m-l-20">Nổi Bật</label>
        </div>
        <button class="btn btn-primary waves-effect" type="submit" name="btn_addtin">Sửa Tin</button>
      </form>
    </div>
  </div>
</div>
</div>
<script src="plugins/ckeditor/ckeditor.js"></script>
<script>
  $(document).ready(function(){
   lay_TL_edit($("#lang").val(),<?=$idTin?>); 
   CKEDITOR.replace('ckeditor',{
    language:'vi',skin:'moono',
    filebrowserImageBrowseUrl:'plugins/ckfinder/ckfinder.html?Type=Images',
    filebrowserImageBrowseUploadUrl:'plugins/core/connector/php/connector.php?command=QuickUpload&type=Images',
  });
   CKEDITOR.config.height=300;
   $("#lang").change(function(){
    lay_TL_edit($("#lang").val(),<?=$idTin?>); 
  });   
 });
  function lay_TL_edit(a,b){
    $.get(
      'layTL_edit_tin.php',
      'lang='+a+'&idTin='+b,
      function(html){
        $("#idTL").html(html);
      })
  }
</script>