<?php

use Symfony\Component\HttpFoundation\Session\Session;
$idOder=$_GET['id'];


if (isset($_POST['sbm'])) {
    $id=$_POST['worker'];
    $cont=$_POST['contentPost'];
    $sql="UPDATE  congviec set id_nvchup=$id where id_donhang= $idOder ";
    if($id!="NULL"){
        $sql1="UPDATE  donhang set yeucau='$cont',trangthai=1 where id= $idOder ";
    }else  $sql1="UPDATE  donhang set yeucau='$cont' where id= $idOder ";

    mysqli_query($conn,$sql);
    mysqli_query($conn,$sql1);  
    

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
            $sql="SELECT * from dsdonhang Where id=$idOder";
            $post = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($post);
           

        
        ?>
        <div id="idoder" style="display: none;" ><?=$idOder  ?></div>
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-form-label">Tên khách hàng</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="<?= $row['ten'] ?>" readonly  >
            </div> 
            <div class="form-group">
                <label class="col-form-label">Địa chỉ khách hàng</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="<?= $row['diachi'] ?>" readonly>

            </div> 
            <div class="form-group">
                <label class="col-form-label">SĐT khách hàng</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="<?= $row['dienthoai'] ?>" readonly>

            </div> 
            <div class="form-group">
                <label for="permission">Địa điểm chụp</label>
                <input type="text" class="form-control" name="work" id="work" placeholder="<?= $row['diadiem'] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="permission">Ngày chụp</label>
                <input type="date" class="form-control" name="date" id="date"value="<?= $row['ngaychup'] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="permission">Giá</label>
                <input type="number" class="form-control" name="price" id="price" placeholder="<?= $row['gia'] ?>" readonly >
            </div>
            <div class="form-group">
                    <label for="permission">Trạng thái</label>
                    <input type="number" class="form-control" name="stat" id="stat" placeholder="<?php
                        if ($row['trangthai']==0) echo("Chưa phân việc");
                        if ($row['trangthai']==1) echo("Chưa hoàn thành");
                        if ($row['trangthai']==2) echo("Chờ duyệt"); 
                        if ($row['trangthai']==3) echo("Hoàn thành"); 

                    ?>" readonly>
                <div class="form-group">
                    <label>Nhân viên chụp ảnh</label>
                    <input type="text" class="form-control" name="work" id="work" placeholder="<?php 
                        if($row['trangthai']==0) echo("Chưa phân việc") ;
                        else {
                            $idnv=$row['id_nvchup'];
                            $sql="SELECT ten from thanhvien where id=$idnv";
                            $res=mysqli_fetch_array(mysqli_query($conn,$sql));
                            $text=$idnv."-".$res['ten'];
                            echo($text);
                        }
                    
                    
                    ?>" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="permission">Link ảnh</label>
                
                <input type="text" class="form-control" name="work" id="link" <?php if($_SESSION['user']['lever']==0) echo('readonly')?> value="<?= $row['link']?>">
               
            </div>
            <div class="form-group">
                <label class="col-form-label">Ghi chú</label>
                <textarea rows="10" cols="150" name="contentPost" id="contentPost" class="form-control" placeholder="Không có" value="" readonly><?= $row['yeucau'] ?></textarea>
            </div>       
            
            
            

            
        </form>
        <a href="index.php?category=manageOrders" class="btn btn-primary"> Quay Về</a>
        <Button id="ConfirmWork" class="btn btn-outline-danger"style="<?php if (($row['trangthai']!=2&&$_SESSION["user"]['lever']==0)||$_SESSION["user"]['lever']==1) echo("display: none;") ?>" ><div id="tagert" style="display: none;" ><?=$idOder?></div>Xác nhận hoàn thành</Button>
        </div>
    </div>
</div>
