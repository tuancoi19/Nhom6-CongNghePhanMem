<?php
	if(!defined("TEMPLATE_PASS")){
		echo "Bạn không có quyền truy cập file này"."<br/>"; ?>
		
		<button><a href="../login.php">Trở về</a></button>
	<?php	die('');
    }?>

<?php
    $user_mail = $_SESSION['mail'];
    $sql = "SELECT*FROM user WHERE user_mail = '$user_mail'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);

    if(isset($_POST['sbm'])){
        $user_pass = $_POST['user_pass'];
        $user_re_pass = $_POST['user_re_pass'];
        if($user_pass != $user_re_pass){
            $error = '<div class="alert alert-danger">Mat khau khong khop !</div>';
        }else{
            $sql_update = "UPDATE user SET user_pass = '$user_pass'
              WHERE user_mail = '$user_mail'";
            mysqli_query($conn,$sql_update);
            header('location: reset.php?pass=change_succes');
        }
    }
?>

<div id="order-success">
    <div class="row">
        <div id="order-success-img" class="col-lg-3 col-md-3 col-sm-12"></div>
        <div id="order-success-txt" class="col-lg-9 col-md-9 col-sm-12">
            <h2>Đổi mật khẩu</h2>
            <h4><?php if($row['user_level']==1){echo 'Admin: ';}else{echo 'Member: ';} echo $row['user_full']; ?></h4>
            <h4>Mail: <?php echo $user_mail; ?></h4>
        </div>
    </div>
</div>

    <form id="login-form" class="form" method="post">
        <h3 class="text-center text-info">Đổi mật khẩu</h3>
        <br>
        <div class="form-group">
            <h4><?php if($row['user_level']==1){echo 'Admin: ';}else{echo 'Member: ';} echo $row['user_full']; ?></h4>
            <h4>Mail: <?php echo $user_mail; ?></h4>
        </div> <br>
        <div class="form-group">
            <?php if(isset($error)){ echo $error;} ?>
            <label class="text-info">PassWord:</label><br>
            <input name="user_pass" required type="password" class="form-control">
        </div>
        <div class="form-group">
            <label class="text-info">Nhap lai PassWord:</label><br>
            <input name="user_re_pass" required type="password" class="form-control">
        </div>
        
        <div class="form-group">
			<input type="submit" name="sbm" class="btn btn-info btn-md" value="Thêm mới">
            <button type="reset" class="btn btn-default btn-md">Làm mới</button>
            <a href="../login.php" class="btn btn-danger btn-md">Huỷ</a>
        </div>
     </form>