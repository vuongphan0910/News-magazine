<?php
$rowLT=null;
if(isset($_GET['idLT']))
    $idLT=$_GET['idLT'];
settype($idLT,'int');
$kq=$qt->Detail_Loaitin($idLT);
$rowLT=$kq->fetch_array();
    //$loi=array();
if(isset($_POST['lt_edit']))
{
    $lt=$qt->Edit_LoaiTin($idLT);
    
    echo "<script>document.location='index.php?p=loaitin_list'</script>";
    exit();
}
?>
<div class="row clearfix">
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 center-block" style="float: none">
        <div class="card">
            <div class="header">
                <h2>
                    Cập Nhật Loại Tin
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
             <form class="form-horizontal" method="post" action="">
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="lang">Ngôn Ngữ / Language :</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <select class="form-control show-tick" name="lang" id="lang" >
                         
                            <option value="vi">Tiếng Việt</option>
                            <option value="en" <?php if($rowLT['lang']=='en') echo "selected=selected"; ?>>EngLish</option>
                        </select>
                    </div>
                </div>
                <div class="row clearfix ">
                 <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                    <label for="idTL">Tên Thể Loại</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" id="TL" >

                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                    <label for="TenLT">Tên Loại Tin :</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="TenLT" class="form-control" placeholder="Nhập Tên Loại Tin" name="TenLT" minlength="3" maxlength="20" minlength="3" required
                            value="<?php echo $rowLT['Ten'];
                            ?>"
                            >
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                    <label for="ThuTu">Thứ Tự :</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="ThuTu" name="ThuTu" class="form-control" placeholder="Nhập Thứ Tự Xuất Hiện" value="<?=$rowLT['ThuTu']?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                    <label for="AnHien">Ẩn Hiện :</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="radio" id="AnHien_0" name="AnHien" class="form-control" value="0" <?php if($rowLT['AnHien']==0) echo "checked='checked'" ?>>
                            <label for="AnHien_0">Ẩn</label>
                            <input type="radio" id="AnHien_1" name="AnHien" class="form-control" value="1" <?php if($rowLT['AnHien']==1) echo "checked='checked'" ?>>
                            <label for="AnHien_1">Hiện</label>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" value="<?=$idLT?>" name='idLT' id='idLT'>
            <div class="row clearfix">
                <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect" name="lt_edit" >Cập Nhật Loại Tin</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
<script type="text/javascript" charset="utf-8" async defer>

    $(document).ready(function(){
        lay_TL_edit($('#lang').val(),$('#idLT').val());
        
        $('#lang').change(function(){
            lay_TL_edit($('#lang').val(),$('#idLT').val());

        });
    })  
    function lay_TL_edit(a,b){
        $.get(
            'layTL_edit.php',
            'lang='+a+'&idLT='+b,
            function(html){
                $("#TL").html(html);
            })
    }
</script>