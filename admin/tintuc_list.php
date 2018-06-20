 <?php  
 $kq=$qt->Tin_List();
 ?>
 <div class="container-fluid">
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Quản Trị Tin
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
                                <th>idTin/Ngay</th>
                                <th>Tiêu Đề</th>
                                
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php $i=0; while ($rowTin=$kq->fetch_array()){$i++ ?>
                              <tr>
                                <td>idTin :<?=$rowTin['idTin']?>/<p><?=date('H:m:s d-m-Y',strtotime($rowTin['Ngay']))?></p></td>
                                <td><p class="tieude"><?=$rowTin['TieuDe']?> (<?=$rowTin['TenTL']?>-<?=$rowTin['Ten']?>)</p>
                                    <p><?=$rowTin['TomTat']?></p>

                                </td>
                                <td width="150"><a href="?p=tintuc_edit&idTin=<?=$rowTin['idTin']?>"class="btn bg-blue waves-effect">Cập Nhật</a>&nbsp <a href="?p=tintuc_del&idTin=<?=$rowTin['idTin']?>" title="" class="btn bg-red waves-effect" onclick="return confirm('Bạn Có Chắc muốn xóa tin này')">Xóa</a></td>
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