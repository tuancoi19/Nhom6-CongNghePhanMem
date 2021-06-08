<?php
    session_start();
    ob_start();
    define("TEMPLATE", true);
    require("mysqli_connect.php");
    if(isset($_SESSION["user"]["mail"]) && isset($_SESSION["user"]["pass"])){
        include_once("dashboard.php");
    }else{
        include_once("login/index.php");
    }
?>