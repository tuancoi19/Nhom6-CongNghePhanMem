<!-- <?php
$acc_id=$_GET['id'];
$sql="SELECT * FROM thanhvien WHERE id=$acc_id";

$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
if (isset($_POST['sbm'])) {
    $ten=$_POST['name'];
    $diachi=$_POST['add'];
    $dienthoai=$_POST['phone'];
    $ngaysinh=$_POST['birth'];
    $email=$_POST['email'];
    if($ten!=''){
        $sql = "UPDATE thanhvien 
        SET ten='$ten',
            diachi='$diachi',
            ngaysinh='$ngaysinh',
            dienthoai='$dienthoai',
            email='$email'
            WHERE id=$acc_id
        ";
        
        if(mysqli_query($conn,$sql)){
            header("location: index.php");
        }
    }else $error='<div class="alert alert-danger">Không được để trống tên !</div>';
}


?> -->
<div class="col-12 mt-3">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Sửa thông tin tài khoản</h4>
        </div>
        <form role="form" method="post" enctype="multipart/form-data">
        <div class="card-body" id="newUserForm">
        <?php if(isset($error)){ echo $error;}  ?>

            <div class="form-group">
                <label class="col-form-label">Tên</label>
                <input type="text" class="d-block mw-auto w-100 form-fields form-control w-25" name="name"   value="<?= $row['ten'] ?>" />
            </div>
            <div class="form-group">
                <label class="col-form-label">Địa Chỉ</label>
                <input type="text" class="d-block mw-auto w-100 form-fields form-control w-25" name="add"  value="<?= $row['diachi'] ?>" />
            </div>
            <div class="form-group">
                <label class="col-form-label">Điện thoại</label>
                <input type="text" class="d-block mw-auto w-100 form-fields form-control w-25" name="phone"  value="<?= $row['dienthoai'] ?>"/>
            </div>
            <div class="form-group">
                <label class="col-form-label">Ngày sinh</label>
                <input type="date" class="d-block mw-auto w-100 form-fields form-control w-25" name="birth"  value="<?= $row['ngaysinh'] ?>" />
            </div>
            <div class="form-group">
                <label class="col-form-label">Email</label>
                <input type="text" class="d-block mw-auto w-100 form-fields form-control w-25" name="mail"  value="<?= $row['email'] ?>" />
            </div>
            <div class="form-group">
                <label class="col-form-label">Chức vụ hiện tại: <?php 
                    if($row['chucvu']==0) echo'Quản lý'; 
                    if($row['chucvu']==1) echo'Nhân viên bán hàng'; 
                    if($row['chucvu']==2) echo'Nhân Viên chụp ảnh'; 

                ?> </label>
             
            </div>
            
            <button type="submit" name="sbm" class="btn btn-primary">Cập nhập</button>
            <button type="reset" class="btn btn-default">Làm mới</button>
        </div>
        </form>
    </div>
</div>

