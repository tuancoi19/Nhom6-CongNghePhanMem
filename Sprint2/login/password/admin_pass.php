<?php
	if(!defined("TEMPLATE_PASS")){
		echo "Bạn không có quyền truy cập file này"."<br/>"; ?>
		
		<button><a href="../login.php">Trở về</a></button>
	<?php	die('');
    }?>

<!doctype html>
<html lang="en">
  <head>
	<title>Title</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../css-js/bootstrap.min.css">
	<link rel="stylesheet" href="../css-js/login.css">
  </head>
  <body>

	<div id="login">
			<h3 class="text-center text-white pt-5">WELCOME</h3>
			<div class="container">
				<div id="login-row" class="row justify-content-center align-items-center">
					<div id="login-column" class="col-md-6">
						<div id="login-box" class="col-md-12">
						<?php

							if(isset($_GET["pass"])){
								switch($_GET["pass"]){

									case "change_pass": include_once("change_pass.php"); break;
									case "change_succes": include_once("change_succes.php"); break;
									case "send_mail": include_once("send_mail.php"); break;
									case "check_mail": include_once("check_mail.php"); break;
									case "check_code": include_once("check_code.php"); break;

									default: include_once("../login.php");
								}
							}else{
								include_once("check_mail.php");
							}
						?>
						</div>
					</div>
				</div>
			</div>
    </div>
	</body>
</html>