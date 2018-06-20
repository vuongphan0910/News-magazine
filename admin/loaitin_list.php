 <?php
 $kq=$qt->ListLoaiTin();
 ?>
 <div class="container-fluid">
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Quản Trị Loại Tin
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
                                <th>Tên Loại Tin</th>
                                <th>Tên Loại Tin Không Dấu</th>
                                <th>Ngôn Ngữ</th>
                                <th>Trạng Thái</th>
                                <th>Thuộc Thể Loại</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php $i=0; while ($rowLT=$kq->fetch_array()){$i++ ?>
                              <tr>
                                <td><?=$i?></td>
                                <td><?=$rowLT['Ten']?></td>
                                <td><?=$rowLT['Ten_KhongDau']?></td>
                                <td><?=$rowLT['lang']=='vi'?'Tiếng Việt':'English'?></td>
                                <td><?=$rowLT['AnHien']==0?'Ẩn':'Hiện'?></td>
                                <td><?=$rowLT['TenTL']?></td>

                                <td><a href="?p=loaitin_edit&idLT=<?=$rowLT['idLT']?>" class="btn bg-blue waves-effect">Cập Nhật</a>&nbsp<a href="?p=loaitin_delete&idLT=<?=$rowLT['idLT']?>" class="btn bg-red waves-effect" onclick="return confirm('bạn có chắc muốn xóa loại tin này')">Xóa</a></td>
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