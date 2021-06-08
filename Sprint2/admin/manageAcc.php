<div class="user-management col-12 mt-3">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Danh sách thành viên</h3>
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
                            <th scope="col">Tên</th>
                            <th scope="col">Tài khoản</th>
                            <th scope="col">Chức vụ</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $idnv=$_SESSION['user']['id'];
                        $sql = "SELECT * FROM dsnhanvien where id != $idnv";
                        $acc = mysqli_query($conn, $sql);
                        while ($rowAcc = mysqli_fetch_array($acc)) {
                        ?>
                            <tr>
                                <td class="idnv" ><?php echo $rowAcc['id']; ?></td>
                                <td><?php echo $rowAcc['ten'];?></td>
                                <td><?php echo $rowAcc['taikhoan']; ?></td>
                                <td>
                                    <?php
                                    if ($rowAcc['chucvu'] == 2) {
                                        echo 'Nhân viên chụp ảnh';
                                    } else if ($rowAcc['chucvu'] == 1) {
                                        echo 'Nhân viên bán hàng';
                                    }
                                    ?>
                                </td>
                                
                                <td class="d-flex justify-content-end">
                                    <button type="button"  class="btn btn-outline-danger deletenv" ><i class="fas fa-trash-alt"></i></a></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

