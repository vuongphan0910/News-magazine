 <div class="container-fluid">
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Quản Trị Thể Loại
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
                   <?php if(isset($_SESSION['loi'])) { ?>
                      <div class="alert alert-danger">
                        <strong> <?php  echo $_SESSION['loi'];unset($_SESSION['loi']) ?></strong>
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
                                <th>STT</th>
                                <th>Tên Thể Loại</th>
                                <th>Tên Không Dấu</th>
                                <th>Ngôn Ngữ</th>
                                <th>Trạng Thái</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php $kq=$qt-> ListTheLoai();
                         $i=0;
                         while ($rowTL=$kq->fetch_array()) {
                            $i++;
                            ?>
                            <tr>
                                <td><?=$i?></td>
                                <td><?=$rowTL['TenTL']?></td>
                                <td><?=$rowTL['TenTL_KhongDau']?></td>
                                <td><?php echo $rowTL['lang']=='vi'?'Tiếng Việt':'EngLish' ?></td>
                                <td><?php echo $rowTL['AnHien']==1?'Hiện' : 'Ẩn'?></td>
                                <td align="center"><a href="?p=theloai_edit&idTL=<?= $rowTL['idTL']?>"class="btn bg-blue waves-effect">Cập Nhật</a>&nbsp <a href="?p=theloai_delete&idTL=<?= $rowTL['idTL']?>" title="" class="btn bg-red waves-effect">Xóa</a></td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<!-- #END# Basic Examples -->
</div>