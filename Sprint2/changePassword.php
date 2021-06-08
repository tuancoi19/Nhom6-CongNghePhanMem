<?php
$user_id=$_GET['id'];
$sql="SELECT * FROM users WHERE id=$user_id";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
if (isset($_POST['sbm'])) {
    $pass=$_POST['pass'];
    $npass = $_POST['newpass'];
    $cpass = $_POST['cnewpass'];
    if($row['password']==$pass){
        if($npass==$cpass){
            $sql = "UPDATE users 
            SET password ='$npass'
                WHERE id=$user_id
            ";
            if(mysqli_query($conn,$sql)){
                header("location: index.php?category=manageAcc");
            }
            
            
        }
        else{
            $err="Pass nhập lại không đúng";
        }
    }else{
        $err="Pass cũ không đúng";
    }
   
}
if(isset($err)){
?>
    <script>
        alert('<?php echo $err?>')
    </script>
<?php    
}
?>
<div class="col-12 mt-3">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">New Account</h4>
            <p class="card-category">Cr</p>
        </div>
        <form role="form" method="post" enctype="multipart/form-data">
        <div class="card-body" id="newUserForm">
            <div class="form-group">
                <label class="col-form-label">Old Password</label>
                <input type="password" class="form-control" name="pass" id="Name" maxlength="30" >
            </div>
            <div class="form-group">
                <label class="col-form-label">New Password</label>
                <input type="password" class="d-block mw-auto w-100 form-fields form-control w-25" name="newpass" id="email">
            </div>
            <div class="form-group">
                <label class="col-form-label">Confirm Password</label>
                <input type="password" class="form-control" name="cnewpass" id="Add" maxlength="30">
            </div>
            <div class="card-bottom">
                <input type="submit" class="btn btn-info d-block ml-auto" id="newUserBtn" name="sbm" value="ADD NEW" />
            </div>
        </div>
        </form>
    </div>
</div>
