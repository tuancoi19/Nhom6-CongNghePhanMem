<?php
$acc_id=$_GET['id'];
$sql="SELECT * FROM donhang WHERE id=$acc_id";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);

if (isset($_POST['sbm'])) {

    $ten=$_POST['name'];
    $diachi=$_POST['add'];
    $dienthoai=$_POST['phone'];
    $diadiem=$_POST['work'];
    $ngaychup=$_POST['day'];
    $gia=$_POST['price'];
    $yeucau=$_POST['contentPost'];
    if($ten!=""&&$diachi!=""&&$dienthoai!=""&&$diadiem!=""&&$ngaychup!="00-00-0000"&&$gia!=""){
        $sql = "UPDATE donhang 
        SET ten='$ten',
            diachi = '$diachi',
            dienthoai = '$dienthoai',
            diadiem = '$diadiem',
            ngaychup = '$ngaychup',
            gia = $gia,
            yeucau = '$yeucau'
            WHERE id=$acc_id
        ";
        echo($sql);
        if(mysqli_query($conn,$sql)){
            header("location: index.php?category=manageOrders");
        }
    }else $error='<div class="alert alert-danger">Dữ liệu không đúng !</div>';
}
?>
<div class="col-12 mt-5">
    <div class="card table-big-boy">
        <div class="card-header ">
            <h4 class="card-title">Sửa thông tin đơn hàng</h4>
            <br />
        </div>
        <div class="card-body" id="newUserForm">
        <form role="form" method="post" enctype="multipart/form-data">
        <?php if(isset($error)){ echo $error;} ?>
            <div class="form-group">
                <label class="col-form-label">Tên khách hàng</label>
                <input type="text" class="form-control" name="name" id="title" value="<?=$row['ten'] ?>">
            </div> 
            <div class="form-group">
                <label class="col-form-label">Địa chỉ khách hàng</label>
                <input type="text" class="form-control" name="add" id="title"  value="<?=$row['diachi'] ?>"  >

            </div> 
            <div class="form-group">
                <label class="col-form-label">SĐT khách hàng</label>
                <input type="text" class="form-control" name="phone" id="title" value="<?=$row['dienthoai'] ?>" >

            </div> 
            <div class="form-group">
                <label class="col-form-label">Địa chỉ chụp </label>
                <input type="text" class="form-control" name="work" id="title" value="<?=$row['diachi'] ?>">

            </div> 
            <div class="form-group">
                <label class="col-form-label">Ngày chụp</label>
                <input type="date" class="form-control" name="day" id="title" value="<?=$row['ngaychup'] ?>">

            </div> 
            <div class="form-group">
                <label class="col-form-label">Giá</label>
                <input type="number" class="form-control" name="price" id="title" value="<?=$row['gia'] ?>" >

            </div> 
            <div class="form-group">
                <label class="col-form-label">Ghi chú</label>
                <textarea rows="10" cols="150" name="contentPost" id="contentPost" class="form-control"  ><?=$row['yeucau'] ?></textarea>
            </div>       
            <button type="submit" name="sbm" class="btn btn-primary">Cập nhập</button>
            <button type="reset" class="btn btn-default">Làm mới</button>
        </form>
        </div>
    </div>
</div>
