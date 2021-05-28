<div class="user-management col-12 mt-3">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Danh sách công việc</h3>
            <div class="status-bar mt-3 d-flex">
                <form>
                    <input type="text" class="textbox" placeholder="Search" />
                </form>
                <button title="Tìm kiếm" type="submit" class="button"><i class="fas fa-search"></i></button>
                <?php if($_SESSION['user']['lever']==1){ ?>
                    <a class="text-decoration-none ml-auto" href="index.php?category=newOrders"><input type="button" class="btn btn-outline-secondary" value="Thêm Post" /></a>
                <?php } ?>
            </div>
        </div>
        <div class="card-body">
        <?php 
            $id=$_SESSION['user']['id'];
            $sql = "SELECT * FROM donhang where id in(select id_donhang from congviec where id_nvchup=$id) ORDER BY id DESC ";
            
            $post = mysqli_query($conn, $sql);
            if(mysqli_num_rows($post)>0){
        ?>
            <div class="list-users mt-5 table-responsive">
                <table class="table table-hover text-center" id="showUser">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên khách hàng</th>
                            <th scope="col">Địa chỉ khách hàng</th>
                            <th scope="col">SĐT khách hàng</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        
                        while($row = mysqli_fetch_array($post)  ) {
                    ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['ten'];?></td>
                            <td><?php echo $row['diachi']; ?></td>
                            <td><?php echo $row['dienthoai']; ?></td>
                            <td><?php 
                            if ($row['trangthai']==0) echo("Chưa phân việc");
                            if ($row['trangthai']==1) echo("Chưa hoàn thành");
                            if ($row['trangthai']==2) echo("Đã hoàn thành"); 
                            

                            ?></td>
                            <td class="d-flex justify-content-end">
                            <a class="text-decoration-none ml-auto" href="index.php?category=infoOder&id=<?=$row['id'] ?>"> <button type="button" class="btn btn-outline-secondary mr-2"><i class="fas fa-info"></i></button></a>
                            <a class="text-decoration-none ml-auto" href="index.php?category=editOder&id=<?=$row['id'] ?>"> <button type="button" class="btn btn-outline-info mr-2"  id="editUserBtn" ><i class="fas fa-edit"></i></button>
                            <?php  if($_SESSION['user']['lever']==10){ ?> 
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#confirm-delete" data-user="<?=$rowUser['userID'];?>" id ="deleteUserBtn"><i class="fas fa-trash-alt"></i></button>
                            <?php } ?>
                            </td>
                        </tr>
                        
                        <?php }} else echo('<div>Hiện tại bạn chưa có đơn hàng được phân công</div>'); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

