<?php
     require_once('../mysqli_connect.php');
     $sql='';
     $sql2='';
     if($_POST['type']=='editWork'){
    
          $id=$_POST['id1'];
          $id1=$_POST['id2'];

          
          $sql="UPDATE congviec set id_nvchup=$id where id_donhang=$id1;";
          $sql2="UPDATE donhang set trangthai=1 where id= $id1";
          if($id=="NULL")  $sql2="UPDATE donhang set trangthai=0 where id= $id1;";
     }
     if($_POST['type']=='confirmWork'){
          $id=$_POST['id'];
          $sql="UPDATE donhang set trangthai=3 where id=$id;";
     }
     if($_POST['type']=='link'){
          $id=$_POST['id'];
          $link=$_POST['link'];
          $sql="UPDATE donhang set trangthai=2 where id=$id;";
          $sql2="UPDATE congviec set link='$link'where id_donhang=$id ;";
     }
     if($_POST['type']=='delete'){
          $id=$_POST['id'];
          $sql="DELETE from donhang where id=$id";
     }
     if($_POST['type']=='deletenv'){
          $id=$_POST['id'];
          $sql="DELETE from thanhvien where id=$id";
     }
     // $sql=$sql.$sql2;
     echo($sql);
     echo($sql2);
     mysqli_query($conn,$sql);
     mysqli_query($conn,$sql2);
     


?>