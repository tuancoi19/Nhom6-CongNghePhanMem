<?php
    require('mysqli_connect.php');
    $user_name=$_SESSION["user"]["fullname"];

// if (!isset($_SESSION['level'])) {
//     header('Location: index.php');
// }
?>
<html lang="en">

<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="admin/style.css">
    <link rel="stylesheet" type="text/css" href="admin/assets/css/style.css">
    <script src="admin/ckeditor/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>

<body>

    <div class="alert alert-success notify-success p-13" role="alert">
    </div>
    <div class="wrapper">
        <div class='sidebar'>
            <div class="sidebar-wrapper">
                <div class="logo">
                    <img class="img-logo" src="./images/logo.jpg" alt="Logo" />
                    <a class="link-hcmedia" href="index.php" alt="Trang chủ">HC MEDIA</a>
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?category=home">
                            <i class="nc-icon nc-grid-45"></i>
                            <span class="nav-item-title">Trang chủ</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#component2">
                            <i class="nc-icon nc-single-02"></i>
                            <span class="nav-item-title">Tài khoản<i class="fas fa-caret-down"></i></span>
                        </a>
                        
                        <ul class="nav collapse" id="component2">
                        <?php 
                            if($_SESSION['user']['lever']==0){
                        ?>
                            <li class="nav-item nav-child">
                                <a class="nav-link" href="index.php?category=manageAcc">
                                    <span class="link-name-mini">MP</span>
                                    <span class="link-name-normal nav-item-title">Danh sách tài khoản</span>
                                </a>
                            </li>
                            <li class="nav-item nav-child">
                                <a class="nav-link" href="index.php?category=newAccount">
                                    <span class="link-name-mini">AP</span>
                                    <span class="link-name-normal nav-item-title">Thêm mới tài khoản</span>
                                </a>
                            </li>
                            <?php } ?>
                            <li class="nav-item nav-child">
                                <a class="nav-link" href="#">
                                    <span class="link-name-mini">ACC</span>
                                    <span class="link-name-normal nav-item-title">Sửa thông tin cá nhân</span>
                                </a>
                            </li>
                        </ul>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#component1">
                            <i class="nc-icon nc-single-copy-04"></i>
                            <span class="nav-item-title">Đơn hàng<i class="fas fa-caret-down"></i></span>
                        </a>
                        <ul class="nav collapse" id="component1">
                        <?php 
                            if($_SESSION['user']['lever']!=2){
                        ?>
                            <li class="nav-item nav-child">
                                <a class="nav-link" href="index.php?category=manageOrders">
                                    <span class="link-name-mini">MO</span>
                                    <span class="link-name-normal nav-item-title">Danh sách đơn hàng</span>
                                </a>
                            </li>
                            <li class="nav-item nav-child">
                                <a class="nav-link" href="index.php?category=newOrders">
                                    <span class="link-name-mini">AO</span>
                                    <span class="link-name-normal nav-item-title">Tạo mới đơn hàng</span>
                                </a>
                            </li>
                        <?php
                            }
                         
                            if($_SESSION['user']['lever']==2){
                        
                        ?>
                            <li class="nav-item nav-child">
                                <a class="nav-link" href="index.php?category=Orderlist">
                                    <span class="link-name-mini">OL</span>
                                    <span class="link-name-normal nav-item-title">Danh sách công việc</span>
                                </a>
                            </li>
                        <?php } ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class='main-content white-space'>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="sidebar-toggle">
                            <button id="btn-toggle" class="sidebar-toggle-btn">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                        <div>
                            
                            <div class="users-wrapper">
                                <div class="users-info">
                                    <span><?php echo $user_name ?></span>
                                </div>
                                <ul class="nav users-dropdown" id="component3">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php?category=changepass&id=<?php $user_id=$_SESSION['user']['id'];echo $user_id?>">
                                            <i class="nc-icon nc-refresh-02"></i>
                                            <span class="link-name-normal">Đổi mật khẩu</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="./admin/logout.php">
                                            <i class="nc-icon nc-button-power"></i>
                                            <span class="link-name-normal text-danger">Đăng xuất</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <?php
            if (isset($_GET['category'])) {
                $category = $_GET['category'];
            } else {
                $category = '';
            }
            switch ($category) {
                case "home":
                    include('admin/home.php');
                    break;
                case "newOrders":
                    include('admin/newOrders.php');
                    break;
                case "newAccount":
                    include('admin/newAccount.php');
                    break;
                case "manageAcc":
                    include('admin/manageAcc.php');
                    break;
                case "manageOrders":
                    include('admin/manageOrders.php');
                    break;
                case "editacc":
                    include('admin/editacc.php');
                    break;
                case "infoOder":
                    include('admin/infoOder.php');
                    break;
                case "editOder":
                    include('admin/editOder.php');
                    break;
                case "changepass":
                    include('changePassword.php');
                    break;
                case "Orderlist":
                    include('admin/Orderlist.php');
                    break;
                default:
                    include('admin/home.php');
                    break;
            }
            ?>
        </div>
    </div>
    <!-- <script>
        if ($("#contentPost").length) {
            CKEDITOR.replace('contentPost',
            {

                filebrowserBrowseUrl : 'admin/ckfinder/ckfinder.html',
                filebrowserImageBrowseUrl : 'admin/ckfinder/ckfinder.html?type=Images',
                filebrowserFlashBrowseUrl : 'admin/ckfinder/ckfinder.html?type=Flash',
                filebrowserUploadUrl : 'admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserImageUploadUrl : 'admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                filebrowserFlashUploadUrl : 'admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

            });
        }
    </script> -->
    <script src="js/editSubject.js"></script>
    <script src="js/changePass.js"></script>
    <script src="admin/assets/js/script.js"></script>
    <script src="admin/assets/js/index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>
</html>
