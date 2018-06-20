<?php
$row=null;
$idTL=$_GET['idTL'];
$kq=$qt->Detail_Theloai($idTL);
if($kq)
    $row=$kq->fetch_array();
if(isset($_POST['tl_edit']))
{
    $qt->Edit_TheLoai($idTL);
    echo "<script>document.location='index.php?p=theloai_list'</script>";
    exit();
}
?>
<div class="row clearfix">
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 center-block" style="float: none">
        <div class="card">
            <div class="header">
                <h2>
                    Edit Thể Loại
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
                            <label for="TenTL">Tên Thể Loại : </label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="TenTL" class="form-control" placeholder="Nhập Tên Thể Loại" name="TenTL" maxlength="20" minlength="3" required value="<?=$row['TenTL']?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="lang">Ngôn Ngữ/Language :</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <select class="form-control show-tick" name="lang" >
                                <option value="">-- Please select --</option>
                                <option value="vi" <?php echo $row['lang']=='vi'?"selected=selected":"" ?>>Tiếng Việt</option>
                                <option value="en" <?php echo $row['lang']=='en'?"selected=selected":"" ?>>EngLish</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="ThuTu">Thứ Tự :</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="ThuTu" name="ThuTu" class="form-control" placeholder="Nhập Thứ Tự Xuất Hiện" value="<?=$row['ThuTu']?>">
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
                                    <input type="radio" id="AnHien_0" name="AnHien" class="form-control" value="0" <?php echo $row['AnHien']==0?"checked":"" ?> >
                                    <label for="AnHien_0">Ẩn</label>
                                    <input type="radio" id="AnHien_1" name="AnHien" class="form-control" value="1" <?php echo $row['AnHien']==1?"checked":"" ?> >
                                    <label for="AnHien_1">Hiện</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect" name="tl_edit">Cập Nhật Thể Loại</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>