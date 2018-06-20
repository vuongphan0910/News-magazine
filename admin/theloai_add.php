 <?php 
 $loi=array();
 if(isset($_POST['tl_add']))
 {
    $thanhcong=$qt->ThemTheLoai($loi);
    if($thanhcong==true)
    {
        echo "<script>document.location='index.php?p=theloai_list'</script>";
        exit();
    }
}
?>
<div class="row clearfix">
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 center-block" style="float: none">
        <div class="card">
            <div class="header">
                <h2>
                    Thêm Thể Loại
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
                            <label for="TenTL">Tên Thể Loại</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="TenTL" class="form-control" placeholder="Nhập Tên Thể Loại" name="TenTL" maxlength="20" minlength="3" value="<?php if(isset($_POST['TenTL'])) echo $_POST['TenTL'] ?>">
                                    <b id="kq"style="color: red"><?php if(isset($loi['tentl'])){ echo $loi['tentl'] ;}?></b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="lang">Ngôn Ngữ / Language</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <select class="form-control show-tick" name="lang" >
                                <option value="">-- Please select --</option>
                                <option value="vi">Tiếng Việt</option>
                                <option value="en">EngLish</option>   
                            </select>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="ThuTu">Thứ Tự</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="ThuTu" name="ThuTu" class="form-control" placeholder="Nhập Thứ Tự Xuất Hiện">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="AnHien">Ẩn Hiện</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="radio" id="AnHien_0" name="AnHien" class="form-control" value="0">
                                    <label for="AnHien_0">Ẩn</label>
                                    <input type="radio" id="AnHien_1" name="AnHien" class="form-control" value="1" checked="checked">
                                    <label for="AnHien_1">Hiện</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect" name="tl_add" >Thêm Thể Loại</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" charset="utf-8" async defer>
    $(document).ready(function(){
        $('#TenTL').blur(function(){
            $.get(
                'check_theloai.php',
                'TenTL='+$('#TenTL').val(),
                function(d){
                    $('#kq').html(d);
                }
                );
        });
    })   
</script>