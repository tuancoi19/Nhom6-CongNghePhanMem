<?php
	if(!defined("TEMPLATE_PASS")){
		echo "Bạn không có quyền truy cập file này"."<br/>"; ?>
		
		<button><a href="../login.php">Trở về</a></button>
	<?php	die('');
    }?>

<?php
include "../PHPMailer-master/src/PHPMailer.php";
include "../PHPMailer-master/src/Exception.php";
include "../PHPMailer-master/src/OAuth.php";
include "../PHPMailer-master/src/POP3.php";
include "../PHPMailer-master/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


    $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str_body = substr(str_shuffle($permitted_chars), 0, 7); 
    $_SESSION['code'] = $str_body;

    $mail = new PHPMailer(true);                               // Passing 'true' enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'daovanhai0620@gmail.com';                 // SMTP username
        $mail->Password = 'DaoVanHai0110';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, 'ssl' also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        //Recipients
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('daovanhai0620@gmail.com', 'DAOVANHAI');                // Gửi mail tới Mail Server
        $mail->addAddress($_SESSION['mail']);               // Gửi mail tới mail người nhận


        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Xác nhận mail';
        $mail->Body    = $str_body;
        $mail->AltBody = 'lay lai mat khau';
        $mail->send();
        header("location: reset.php?pass=check_code");
    }catch(Exception $e){
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
?>