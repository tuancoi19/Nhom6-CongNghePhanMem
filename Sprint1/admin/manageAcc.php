<div class="user-management col-12 mt-3">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Manager Accounts</h3>
            <div class="status-bar mt-3 d-flex">
                <form>
                    <input type="text" class="textbox" placeholder="Search" />
                </form>
                <button title="Tìm kiếm" type="submit" class="button"><i class="fas fa-search"></i></button>
                <a class="text-decoration-none ml-auto" href="index.php?category=newAccount"><input type="button" class="btn btn-outline-secondary" value="Thêm người dùng" /></a>
            </div>
        </div>
        <div class="card-body">
            <div class="list-account mt-5 table-responsive">
                <table class="table table-hover text-center" id="showAcc">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Level</th>
                            <th scope="col">Address</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM users";
                        $acc = mysqli_query($conn, $sql);
                        while ($rowAcc = mysqli_fetch_array($acc)) {
                        ?>
                            <tr>
                                <td><?php echo $rowAcc['id']; ?></td>
                                <td><?php echo $rowAcc['fullname'];?></td>
                                <td><?php echo $rowAcc['email']; ?></td>
                                <td>
                                    <?php
                                    if ($rowAcc['level'] == 1) {
                                        echo 'Quản lý';
                                    } else if ($rowAcc['level'] == 2) {
                                        echo 'Nhân viên bán hàng';
                                    }else if ($rowAcc['level'] == 3) {
                                        echo 'Nhân viên chụp ảnh';
                                    }
                                    ?>
                                </td>
                                <td><?php echo $rowAcc['address']; ?></td>
                                <td class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-outline-secondary mr-2"><i class="fas fa-info"></i></button>
                                    <button type="button" class="btn btn-outline-info mr-2" ><a href="index.php?category=editacc&id=<?php echo $rowAcc['id'] ?>"><i class="fas fa-edit"></i></a></button>
                                    <button type="button" class="btn btn-outline-danger" ><a href="admin/deleteacc.php?id=<?php echo $rowAcc['id'] ?>"><i class="fas fa-trash-alt"></i></a></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

