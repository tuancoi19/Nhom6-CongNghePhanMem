<div class="user-management col-12 mt-3">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Danh sách đơn hàng</h3>
            <div class="status-bar mt-3 d-flex">
                <form>
                    <input type="text" class="textbox" placeholder="Search" />
                </form>
                <button title="Tìm kiếm" type="submit" class="button"><i class="fas fa-search"></i></button>
                <?php if($_SESSION['user']['lever']==1){ ?>
                    <a class="text-decoration-none ml-auto" href="index.php?category=newOrders"><input type="button" class="btn btn-outline-secondary" value="Thêm đơn hàng" /></a>
                <?php } ?>
            </div>
        </div>
        <div class="card-body">
            <div class="list-users mt-5 table-responsive">
                <?php
                    $id=$_SESSION['user']['id'];
                    if( $_SESSION['user']['lever']==0) $sql = "SELECT * FROM donhang ORDER BY id DESC";
                    else  $sql = "SELECT * FROM donhang where id_nvban=$id ORDER BY id DESC";
                    $post = mysqli_query($conn, $sql);   
                    if(mysqli_num_rows($post)>0){     
                ?>
                <table class="table table-hover text-center" id="showUser">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên khách hàng</th>
                            <th scope="col">Người thêm đơn hàng</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Nhân viên chụp</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($row = mysqli_fetch_array($post)  ) {
                            $idsale=$row['id_nvban'];
                            $sql="SELECT ten from thanhvien where id = $idsale ";
                            $res=mysqli_query($conn,$sql);
                            $sale=mysqli_fetch_array($res);
                    ?>
                        <tr>
                            <td class='Oid'  ><?php echo $row['id']; ?></td>
                            <td><?php echo $row['ten']; ?></td>
                            <td><?php $string=$idsale.'-'.$sale['ten'] ;echo($string);?></td>
                            <td><?php 
                                if ($row['trangthai']==0) echo("Chưa phân việc");
                                if ($row['trangthai']==1) echo("Chưa hoàn thành");
                                if ($row['trangthai']==2) echo("Chờ duyệt"); 
                                if ($row['trangthai']==3) echo("Hoàn thành"); 
                            
                            ?></td>
                            <td>
                            <select class="NV" <?php   if( $_SESSION['user']['lever']!=0) echo ('disabled')  ?> >
                                <option value="NULL"<?php if($row['trangthai']==0) echo('selected') ?> >Chưa có nhân viên</option>
                                <?php
                                    $idOder=$row['id'];
                                    $sql2="SELECT id_nvchup from dscongviec where id_donhang=$idOder ";
                                    $res=mysqli_query($conn,$sql2);
                                    $idnv=mysqli_fetch_array($res)['id_nvchup'];
                                    $sql3="SELECT id,ten from thanhvien Where  chucvu=2 ";
                                    $rows=mysqli_query($conn,$sql3);
                                    $num=mysqli_num_rows($rows);
                                    if($num>0){
                                    while ($rowNV=mysqli_fetch_array($rows)){
                                ?>
                                <option value="<?=$rowNV['id'] ?>" <?php if ($rowNV['id']==$idnv) echo('selected') ?>  ><?php echo($rowNV['id']);echo('-');echo($rowNV['ten'])  ?></option>
                                <?php
                                        
                                    }}
                                ?>
                            </select>
                            </td>
                            <td class="d-flex justify-content-end">
                            <a class="text-decoration-none ml-auto" href="index.php?category=infoOder&id=<?=$row['id'] ?>"> <button type="button" class="btn btn-outline-secondary mr-2"><i class="fas fa-info"></i></button></a>
    
                            <?php  if($_SESSION['user']['lever']==1 &&$row['trangthai']==0){ ?> 
                                <a class="text-decoration-none ml-auto" href="index.php?category=editOder&id=<?=$row['id'] ?>"> <button type="button" class="btn btn-outline-info mr-2"  id="editUserBtn" ><i class="fas fa-edit"></i></button></a>
                                
                                <button type="button" class="btn btn-outline-danger deleteOder" ><i class="fas fa-trash-alt"></i></button>
                            <?php } ?>
                            </td>
                        </tr>
                        <?php }} else echo('<div>Chưa có đơn hàng</div>');?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

