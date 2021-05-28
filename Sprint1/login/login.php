<!doctype html>
<html lang="en">
  <head>
	<title>Title</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="login/css/bootstrap.min.css">
	<link rel="stylesheet" href="login/css/login.css">
</head>
  <body>
	<?php
		require("connect.php");
		if(isset($_POST["sbm"])){
			$mail = $_POST["mail"];
			$pass = $_POST["pass"];
			$sql = "SELECT*FROM taikhoan where email = '$mail' AND password = '$pass' ";
			$query = mysqli_query($conn,$sql);
			$num_row = mysqli_num_rows($query); // dem so luong cac ban ghi
			$row = mysqli_fetch_array($query);
            $id=$row['employee_id'];
            echo($id);
            $sql = "SELECT ten,chucvu FROM thanhvien where id=$id ";
			$query = mysqli_query($conn,$sql);
			$num_row = mysqli_num_rows($query); // dem so luong cac ban ghi
			$row = mysqli_fetch_array($query);
			if($num_row>0){ // neu co ban ghi
				$_SESSION["user"]["mail"] = $mail;
				$_SESSION["user"]["pass"] = $pass;
                $_SESSION["user"]["fullname"]=$row['ten'];
                $_SESSION["user"]["lever"]=$row['chucvu'];
                $_SESSION["user"]["id"] = $id;
				header("location: index.php");
			}else{
				$error = '<div class="alert alert-danger">Tài khoản không hợp lệ !</div>';
			}
		}
	?>
    <div id="login">
        <h3 class="text-center text-white pt-5">WELCOME HC MEDIA</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
							<?php if(isset($error)){ echo $error;} ?>

                                <label for="mail" class="text-info">E-mail:</label><br>
                                <input type="email" name="mail" id="mail" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="pass" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
								<input type="submit" name="sbm" class="btn btn-info btn-md" value="submit">
								<a class="btn text-info" href="password/reset.php">Forgot Password</a>
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="#" class="text-info">Register here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

	</body>
</html>
