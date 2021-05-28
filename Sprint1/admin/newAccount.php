<?php

if (isset($_POST['sbm'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $lever=$_POST['lever'];
    if($name!=""&&$email!=""&&$pass!=""&&$lever!=""){
        $sql = "INSERT INTO thanhvien (ten,chucvu)
        VALUES ('$name','$lever')";
        echo($sql);
        if(mysqli_query($conn,$sql)){
            $sql = "SELECT id FROM thanhvien ORDER BY id DESC LIMIT 1";
            $query = mysqli_query($conn,$sql);
            $num_row = mysqli_num_rows($query); 
            $row = mysqli_fetch_array($query);
            $emp_id=$row['id'];
            $sql="INSERT INTO taikhoan (employee_id,email,password)
            VALUES ('$emp_id','$email','$pass')";
            if(mysqli_query($conn,$sql)){
                header("location: index.php?category=manageAcc");
            } 
        }
    } else{$error = '<div class="alert alert-danger">dữ liệu không hợp lệ!</div>';} 
    
    
    
    
}
?>
<div class="col-12 mt-3">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tài khoản</h4>
            <p class="card-category">Thêm mới tài khoản</p>
        </div>
        <form role="form" method="post" enctype="multipart/form-data">
        <div class="card-body" id="newUserForm">
        <?php if(isset($error)) echo($error); ?>
            <div class="form-group">
                <label class="col-form-label">Họ tên nhân viên: </label>
                <input type="text" class="form-control" name="name" id="Name" maxlength="30" />
            </div>
            <div class="form-group">
                <label class="col-form-label">Tài khoản</label>
                <input type="text" class="d-block mw-auto w-100 form-fields form-control w-25" name="email" id="email" />
            </div>
            <div class="form-group">
                <label class="col-form-label">Mật khẩu</label>
                <input type="password" class="d-block mw-auto w-100 form-fields form-control w-25" name="password" id="pwd" />
            </div>

            <div class="form-group">
                <label>Chức vụ</label>
                <select class="custom-select" name="lever" id="level">
                    <option value="">Select one</option>
                    <option value="1">Nhân viên bán hàng</option>
                    <option value="2">Nhân viên chụp ảnh</option>
                </select>
            </div>
            <div class="card-bottom">
                <input type="submit" class="btn btn-info d-block ml-auto" id="newUserBtn" name="sbm" value="ADD NEW" />
            </div>
        </div>
        </form>
    </div>
</div>
