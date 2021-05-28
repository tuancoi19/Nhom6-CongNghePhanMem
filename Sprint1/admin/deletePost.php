<?php
    require "../mysqli_connect.php";
    session_start();
    $id=$_GET['id'];
    if(isset($_SESSION["user"]["mail"]) && isset($_SESSION["user"]["pass"])){
        $sql="DELETE FROM posts WHERE id = $id";
        mysqli_query($conn,$sql);
        header("location: ../index.php?category=managePost" );
    }
?>