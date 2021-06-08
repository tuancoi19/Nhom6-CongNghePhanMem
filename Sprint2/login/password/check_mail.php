<?php
	if(!defined("TEMPLATE_PASS")){
		echo "Bạn không có quyền truy cập file này"."<br/>"; ?>
		
		<button><a href="../login.php">Trở về</a></button>
	<?php	die('');
    }?>

    <?php

    if (isset($_POST['sbm'])) {
        $user_mail = $_POST['mail'];
        $_SESSION['mail'] = $user_mail;
        $sql = "SELECT*FROM user WHERE user_mail = '$user_mail'";
        $query = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($query);
        if ($num_rows == 0) {
            $error =  '<div class="alert alert-danger mt-3"><h4>Không tìm thấy tài khoản!!</h4>Vui lòng thử lại với thông tin khác.</div>';
        }else{
            header("location: reset.php?pass=send_mail");
        }
    }
    ?>
                    <form id="login-form" class="form" method="post">
                            <h3 class="text-center text-info">Forgot Password</h3>
                            <br>
                            <div class="form-group">
                                <label class="text-info">Vui lòng nhập E-mail để tìm kiếm tài khoản:</label><br>
                            </div>
                            <div class="form-group">
							    <?php if(isset($error)){ echo $error;} ?>

                                <label for="mail" class="text-info">E-mail:</label><br>
                                <input type="email" name="mail" id="mail" class="form-control">
                            </div>
                            <div class="form-group">
								<input type="submit" name="sbm" class="btn btn-info btn-md" value="Tim Kiem">
								<a href="../login.php" class="btn btn-danger btn-md">Huỷ</a>
                            </div>
                        </form>
                
