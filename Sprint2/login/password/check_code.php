<?php
    if (!defined("TEMPLATE_PASS")) {
        echo "Bạn không có quyền truy cập file này" . "<br/>"; ?>

        <button><a href="../login.php">Trở về</a></button>
    <?php die('');
    } ?>

<?php
    if (isset($_POST['resend'])) {
        header("location: reset.php?pass=send_mail");
    }

    if (isset($_POST['sbm'])) {
        $code = $_POST['code'];
        if ($_SESSION['code'] == $code) {
            header("location: reset.php?pass=change_pass");
        } else {
            $error =  '<div class="alert alert-danger mt-3"><h4>LỖI</h4>Mã code không chính xác</div>';
        }
    }

?>

    <form id="login-form" class="form" method="post">
        <h3 class="text-center text-info">Forgot Password</h3>
        <br>
        <div class="form-group">
            <label class="text-info">
                <p>Mã code đã được gửi thành công đến mail của bạn</p>
                <p>Vui lòng nhập mã code xác nhận</p>
            </label><br>
        </div>
        <div class="form-group">
            <?php if(isset($error)){ echo $error;} ?>
            <input class="form-control" name="code" type="text">
        </div>
        <div class="form-group">
			<input type="submit" name="sbm" class="btn btn-info btn-md" value="Xác Nhận">
            <a href="../login.php" class="btn btn-danger btn-md">Huỷ</a>
            <button style="float:right;" name="resend" class="btn">Gửi lại mã code</button>
        </div>
    </form>