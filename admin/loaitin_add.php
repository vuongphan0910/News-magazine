<?php  
$loi=array();
if(isset($_POST['lt_add']))
{
    $thanhcong=$qt->ThemLoaiTin($loi);
    if($thanhcong==true)
    {
        echo "<script>document.location='index.php?p=loaitin_list'</script>";
        exit();
    }
}
?>
<div class="row clearfix">
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 center-block" style="float: none">
        <div class="card">
            <div class="header">
                <h2>
                    Thêm Loại Tin
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
                            <option value="en" <?php if(isset($_GET['lang'])&&($_GET['lang'])=='en') echo "selected=selected"; ?>>EngLish</option>
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
                            <input type="text" id="TenLT" class="form-control" placeholder="Nhập Tên Loại Tin" name="TenLT" maxlength="20" minlength="3" value="<?php if(isset($_POST['TenLT'])) echo $_POST['TenLT'] ?>">
                            <b id="kq_lt"style="color: red"><?php if(isset($loi['tenlt'])){ echo $loi['tenlt'] ;}?></b>
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
                            <input type="text" id="ThuTu" name="ThuTu" class="form-control" placeholder="Nhập Thứ Tự Xuất Hiện">
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
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect" name="lt_add" >Thêm Loại Tin</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
<script type="text/javascript" charset="utf-8" async defer>
    $(document).ready(function(){
        lay_TL();
        
        $('#lang').change(function(){
            lay_TL();
        });//lay select The Loai khi submit ngon ngu

        $('#TenLT').blur(function(){
            $.get('check_loaitin.php',
                'TenLT='+$('#TenLT').val(),
                function(d){
                    $('#kq_lt').html(d);
                })
        });
    })  
    function lay_TL(){
        $.get(
            'layTL.php',
            'lang='+$('#lang').val(),
            function(html){
                $("#TL").html(html);
            })

    }
</script>