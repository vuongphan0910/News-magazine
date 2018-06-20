 <?php 
 $kq=$qt->BL_List();
 ?>
 <div class="container-fluid">
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Quản Trị Bình Luận
                    </h2>
                </div>
                <div class="body">
                    <?php if(isset($_SESSION['thanhcong'])) { ?>
                        <div class="alert alert-success">
                            <strong><?php  echo $_SESSION['thanhcong'];unset($_SESSION['thanhcong']) ?></strong>  
                        </div>
                    <?php } ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>idTin</th>
                                    <th>HoTen</th>
                                    <th>NoiDung</th>
                                    <th>Duyệt</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($rowBL=$kq->fetch_array()) {?>
                                  <tr>
                                    <td><?=$rowBL['idTin']?></td>
                                    <td><?=$rowBL['HoTen']?></td>
                                    <td><?=$rowBL['NoiDung']?></td>
                                    <td><?=$rowBL['Duyet']==1?'Hiện':'Chưa Duyệt'?></td>
                                    <td><a href="?p=bl_edit&idYKien=<?=$rowBL['idYKien']?>"class="btn bg-blue waves-effect">Chỉnh Sửa</a>
                                        <a href="?p=bl_del&idYKien=<?=$rowBL['idYKien']?>" title="" class="btn bg-red waves-effect" onclick="return confirm('Bạn Muốn Xóa Bình Luận Này?')">Xóa</a>
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