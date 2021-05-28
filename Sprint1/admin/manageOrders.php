<div class="user-management col-12 mt-3">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Manager Post</h3>
            <div class="status-bar mt-3 d-flex">
                <form>
                    <input type="text" class="textbox" placeholder="Search" />
                </form>
                <button title="Tìm kiếm" type="submit" class="button"><i class="fas fa-search"></i></button>
                <a class="text-decoration-none ml-auto" href="index.php?category=newOrders"><input type="button" class="btn btn-outline-secondary" value="Thêm Post" /></a>
            </div>
        </div>
        <div class="card-body">
            <div class="list-users mt-5 table-responsive">
                <table class="table table-hover text-center" id="showUser">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên khách hàng</th>
                            <th scope="col">Địa chỉ khách hàng</th>
                            <th scope="col">SĐT khách hàng</th>
                            <th scope="col">Gói sản phẩm</th>
                            <th scope="col">Ghi chú</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT * FROM posts";
                        $post = mysqli_query($conn, $sql);
                        while($posts = mysqli_fetch_array($post)  ) {
                    ?>
                        <tr>
                            <td><?php echo $posts['id']; ?></td>
                            <td><?php echo $posts['title'];?></td>
                            <td><?php echo $posts['content']; ?></td>
                            <td>
                                <?php
                                    if ($posts['categories_id'] == 1) {
                                        echo 'Album';
                                    } else if ($posts['categories_id'] == 2) {
                                        echo 'Bảng giá';
                                    }else if ($posts['categories_id'] == 3) {
                                        echo 'Kỷ yếu miền Bắc';
                                    }else if ($posts['categories_id'] == 4) {
                                        echo 'Tour kỷ yếu';
                                    }else if ($posts['categories_id'] == 5) {
                                        echo 'Thuê trang phục';
                                    }else if ($posts['categories_id'] == 6) {
                                        echo 'Góc tư vấn';
                                    }
                                ?>
                            </td>
                            <td class="d-flex justify-content-end">
                                <button type="button" class="btn btn-outline-secondary mr-2"><i class="fas fa-info"></i></button>
                                <button type="button" class="btn btn-outline-info mr-2" data-toggle="modal" data-target="#editUser" data-user="<?=$rowUser['userID'];?>" id="editUserBtn" ><i class="fas fa-edit"></i></button>
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#confirm-delete" data-user="<?=$rowUser['userID'];?>" id ="deleteUserBtn"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include('admin/modal/editPost.php'); ?>
<?php include('admin/modal/confirmDelete.php'); ?>
