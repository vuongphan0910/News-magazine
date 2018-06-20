 <?php 
 if($_SESSION['login_id']!=1)
   {
        $_SESSION['loi']="Bạn Không có quyền truy cập trang User List này";
        header("location:index.php");
        exit(); 
   }
else {
    $kq=$qt->User_List();
}
?>
<div class="container-fluid">
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Quản Trị User
                    </h2>
                </div>
                <div class="body">
                   <?php if(isset($_SESSION['loi'])) { ?>
                    <div class="alert alert-danger">
                        <strong><?php  echo $_SESSION['loi'];unset($_SESSION['loi']) ?></strong>  
                    </div>
                <?php } ?>
                <?php if(isset($_SESSION['thanhcong'])) { ?>
                    <div class="alert alert-success">
                        <strong><?php  echo $_SESSION['thanhcong'];unset($_SESSION['thanhcong']) ?></strong>  
                    </div>
                <?php } ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>idUser</th>
                                <th>Họ Tên</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Ngày Đăng Ký</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php while ($rowUser=$kq->fetch_array()) {?>
                              <tr>
                                <td><?=$rowUser['idUser']?></td>
                                <td><?=$rowUser['HoTen']?></td>
                                <td><?=$rowUser['Username']?></td>
                                <td><?=$rowUser['Email']?></td>
                                <td><?=date('d-m-Y',strtotime($rowUser['NgayDangKy']))?></td>
                                <td><a href="?p=user_edit&idUser=<?=$rowUser['idUser']?>"class="btn bg-blue waves-effect">Xem Profile</a>
                                    <a href="?p=user_del&idUser=<?=$rowUser['idUser']?>" title="" class="btn bg-red waves-effect" onclick="return confirm('Bạn Muốn Xóa User Này?')">Xóa</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<!-- #END# Basic Examples -->

</div>