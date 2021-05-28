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
                
               <?php }?>
            </div>
        </div>
        <div class="card-body">
            <div class="list-users mt-5 table-responsive">
                <table class="table table-hover text-center" id="showUser">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên khách hàng</th>
                            <th scope="col">Địa chỉ chụp</th>
                            <th scope="col">SĐT khách hàng</th>
                            <th scope="col">Nhân viên phụ trách</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if($_SESSION['user']['lever']==0){
                        $sql = "SELECT * FROM donhang";
                        $post = mysqli_query($conn, $sql);
                        }
                        else{
                            $sale=$_SESSION['user']['id'];
                            $sql = "SELECT * FROM donhang where id_nvban=$sale ";
                            $post = mysqli_query($conn, $sql); 
                        }
                        while($row = mysqli_fetch_array($post)  ) {
                    ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['ten'];?></td>
                            <td><?php echo $row['diadiem']; ?></td>
                            <td><?php echo $row['dienthoai']; ?></td>
                            <td><?php if($row['trangthai']==0) echo("Chưa có") ?></td>
                            
                            <td class="d-flex justify-content-end">
                            <a class= "text-decoration-none ml-auto"  href="index.php?category=infoOder&id=<?= $row['id'] ?>" > <button type="button" class="btn btn-outline-secondary mr-2"><i class="fas fa-info"></i></button></a>
                                
                                <?php if($_SESSION['user']['lever']==1){ ?>
                                <button type="button" class="btn btn-outline-info mr-2" ><i class="fas fa-edit"></i></button>
                                <button type="button" class="btn btn-outline-danger" ><i class="fas fa-trash-alt"></i></button>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

