<?php
$acc_id=$_GET['id'];
$sql="SELECT * FROM users WHERE id=$acc_id";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
if (isset($_POST['sbm'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $add=$_POST['address'];
    $birthday=$_POST['birthday'];
    $lever=$_POST['lever'];
    $sql = "UPDATE users 
    SET fullname='$name',
        email = '$email',
        address = '$add',
        birthday = '$birthday',
        level = $lever
        WHERE id=$acc_id
    ";
    if(mysqli_query($conn,$sql)){
        header("location: index.php?category=manageAcc");
    }
    
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
                <label class="col-form-label">Full Name:</label>
                <input type="text" class="form-control" name="name" id="Name" maxlength="30" value="<?php echo $row['fullname'] ?>" >
            </div>
            <div class="form-group">
                <label class="col-form-label">Email Account</label>
                <input type="text" class="d-block mw-auto w-100 form-fields form-control w-25" name="email" id="email" value="<?php echo $row['email'] ?>"/>
            </div>
            <div class="form-group">
                <label class="col-form-label">Address</label>
                <input type="text" class="form-control" name="address" id="Add" maxlength="30" value="<?php echo $row['address'] ?>"/>
            </div>
            <div class="form-group">
                <label class="col-form-label">Birthday</label>
                <input type="date" class="form-control" name="birthday" id="birthday" maxlength="30" value="<?php echo $row['birthday'] ?>"/>
            </div>
            <div class="form-group">
                <label>Lever</label>
                <select class="custom-select" name="lever" id="level" >
                    <option value="">Select one</option>
                    <option value="1" <?php if($row['level']==1) echo'selected' ?>>1</option>
                    <option value="2" <?php if($row['level']==2) echo'selected' ?>>2</option>
                </select>
                <div class="invalid-feedback" style="font-size: 12px">Level is required.</div>
            </div>
            <div class="card-bottom">
                <input type="submit" class="btn btn-info d-block ml-auto" id="newUserBtn" name="sbm" value="ADD NEW" />
            </div>
        </div>
        </form>
    </div>
</div>
