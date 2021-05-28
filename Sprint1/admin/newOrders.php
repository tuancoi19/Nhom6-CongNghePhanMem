<?php

if (isset($_POST['sbm'])) {
    $idnv=$_SESSION['user']['id'];
    $name=$_POST['name'];
    $add=$_POST['add'];
    $phone=$_POST['phone'];
    $work=$_POST['work'];
    $date=$_POST['day'];
    $price=$_POST['price'];
    $cont=$_POST['contentPost'];
    if($name!=""&&$phone!=""&&$work!=""&&$date!='000-000-000'&&$price!=""){
        $sql = "INSERT INTO donhang (ten, diachi,dienthoai,diadiem,ngaychup,id_nvban,yeucau,gia )
        VALUES ('$name','$add','$phone','$work','$date',$idnv,'$cont','$price')";
        echo($sql);
        if(mysqli_query($conn,$sql)){
            $sql="SELECT id from donhang ORDER BY id DESC LIMIT 1";
            $query = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($query);
            $iddh=$row['id'];
            $sql = "INSERT INTO congviec (id_donhang)
            VALUES($iddh)";
            mysqli_query($conn,$sql);
            header("location: index.php?category=manageOrders");
        }
    }else{$error = '<div class="alert alert-danger">Dữ liệu không đúng !</div>';}
}
?>




<div class="col-12 mt-5">
    <div class="card table-big-boy">
        <div class="card-header ">
            <h4 class="card-title">Đơn hàng mới </h4>
            <p class="card-category">Tạo đơn hàng mới</p>
            <br />
        </div>
        <div class="card-body" id="newUserForm">
        <form role="form" method="post" enctype="multipart/form-data">
        <?php if(isset($error)){ echo $error;} ?>
            <div class="form-group">
                <label class="col-form-label">Tên khách hàng</label>
                <input type="text" class="form-control" name="name" id="title">
            </div> 
            <div class="form-group">
                <label class="col-form-label">Địa chỉ khách hàng</label>
                <input type="text" class="form-control" name="add" id="title">

            </div> 
            <div class="form-group">
                <label class="col-form-label">SĐT khách hàng</label>
                <input type="text" class="form-control" name="phone" id="title">

            </div> 
            <div class="form-group">
                <label class="col-form-label">Địa chỉ chụp </label>
                <input type="text" class="form-control" name="work" id="title">

            </div> 
            <div class="form-group">
                <label class="col-form-label">Ngày chụp</label>
                <input type="date" class="form-control" name="day" id="title">

            </div> 
            <div class="form-group">
                <label class="col-form-label">Giá</label>
                <input type="number" class="form-control" name="price" id="title">

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
