<?php

use Symfony\Component\HttpFoundation\Session\Session;


if (isset($_POST['sbm'])) {
    $name=$_POST['name'];
    $add=$_POST['address'];
    $phone=$_POST['phone'];
    $work=$_POST['work'];
    $date=$_POST['date'];
    $price=$_POST['price'];
    $cont=$_POST['contentPost'];
    $id=$_SESSION['user']["id"];
    if($name!=""&&$add!=""&&$phone!=""&&$work!=""&&$date!="0000-00-00"&&$price!=""){
        $sql = "INSERT INTO donhang (ten, diachi,dienthoai,diadiem,ngaychup,id_nvban,yeucau,gia )
        VALUES ('$name','$add','$phone','$work',$date,'$id','$cont',$price)";
        if(mysqli_query($conn,$sql)){
            header("location: index.php?category=manageOrders");
        }
    }else{$error = '<div class="alert alert-danger">Dữ liệu không hợp lệ!</div>';} 
}
?>




<div class="col-12 mt-5">
    <div class="card table-big-boy">
        <div class="card-header ">
            <h4 class="card-title">Đơn hàng</h4>
            <p class="card-category">Chỉnh sửa đơn hàng</p>
            <br />
        </div>
        <div class="card-body" id="newUserForm">
        <?php 
            if(isset($error) )echo($error);
            $idOder=$_GET['id'];
            echo($idOder);
        
        ?>
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-form-label">Tên khách hàng</label>
                <input type="text" class="form-control" name="name" id="name">
            </div> 
            <div class="form-group">
                <label class="col-form-label">Địa chỉ khách hàng</label>
                <input type="text" class="form-control" name="address" id="address">

            </div> 
            <div class="form-group">
                <label class="col-form-label">SĐT khách hàng</label>
                <input type="text" class="form-control" name="phone" id="phone">

            </div> 
            <div class="form-group">
                <label for="permission">Địa điểm chụp</label>
                <input type="text" class="form-control" name="work" id="work">
            </div>
            <div class="form-group">
                <label for="permission">Ngày chụp</label>
                <input type="date" class="form-control" name="date" id="date">
            </div>
            <div class="form-group">
                <label for="permission">Giá</label>
                <input type="number" class="form-control" name="price" id="price">
            </div>
            <div class="form-group">
                <label class="col-form-label">Ghi chú</label>
                <textarea rows="10" cols="150" name="contentPost" id="contentPost" class="form-control" placeholder="Here can be your description" value=""></textarea>
            </div>       
            <button type="submit" name="sbm" class="btn btn-primary">Thêm mới</button>
            <button type="reset" class="btn btn-default">Làm mới</button>
        </form>
        </div>
    </div>
</div>
