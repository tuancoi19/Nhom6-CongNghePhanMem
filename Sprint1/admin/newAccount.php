<?php

if (isset($_POST['sbm'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $lever=$_POST['lever'];
    if($name!=""&&$email!=""&&$pass!=""&&$lever!=""){
        $sql = "INSERT INTO thanhvien (ten,chucvu)
        VALUES ('$name','$lever')";
        if(mysqli_query($conn,$sql)){
            $sql="SELECT id FROM thanhvien ORDER BY ID DESC LIMIT 1";
            $query = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($query);
            $idnv=$row['id'];
            $sql = "INSERT INTO taikhoan (id_thanhvien,taikhoan,matkhau)
            VALUES ($idnv,'$email','$pass')";
            // echo($sql);
            if(mysqli_query($conn,$sql)){
                header("location: index.php?category=manageAcc");
            }
        }
    }else{$error = '<div class="alert alert-danger">Dữ liệu không đúng !</div>';}
    
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
        <?php if(isset($error)){ echo $error;} ?>
            <div class="form-group">
                <label class="col-form-label">Full Name:</label>
                <input type="text" class="form-control" name="name" id="Name" maxlength="30" />
            </div>
            <div class="form-group">
                <label class="col-form-label">Email Account</label>
                <input type="text" class="d-block mw-auto w-100 form-fields form-control w-25" name="email" id="email" />
            </div>
            <div class="form-group">
                <label class="col-form-label">Password</label>
                <input type="password" class="d-block mw-auto w-100 form-fields form-control w-25" name="password" id="pwd" />
            </div>
            <div class="form-group">
                <label>Lever</label>
                <select class="custom-select" name="lever" id="level">
                    <option value="">Select one</option>
                    <option value="1">Nhân viên bán hàng</option>
                    <option value="2">Nhân viên chụp ảnh</option>
                </select>
                <div class="invalid-feedback" style="font-size: 12px">Level is required.</div>
            </div>
            <div class="card-bottom">
                <input type="submit" class="btn btn-info d-block ml-auto" id="newUserBtn" name="sbm" value="ADD NEW" />
            </div>
        </div>
        </form>
    </div>
</div>
