<?php

if (isset($_POST['sbm'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $add=$_POST['address'];
    $birthday=$_POST['birthday'];
    $lever=$_POST['lever'];
    $sql = "INSERT INTO users (fullname, email,password,address,birthday,level)
    VALUES ('$name','$email','$pass', '$add','$birthday','$lever')";
    if(mysqli_query($conn,$sql)){
        header("location: index.php?category=manageAcc");
    }
    
}
?>
<div class="col-12 mt-3">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">New Account</h4>
            <p class="card-category">Create a new account</p>
        </div>
        <form role="form" method="post" enctype="multipart/form-data">
        <div class="card-body" id="newUserForm">
            <div class="form-group">
                <label class="col-form-label">Full Name:</label>
                <input type="text" class="form-control" name="name" id="Name" maxlength="30" />
            </div>
            <div class="form-group">
                <label class="col-form-label">Email Account</label>
                <input type="text" class="d-block mw-auto w-100 form-fields form-control w-25" name="email" id="email" />
            </div>
            <div class="form-group">
                <label class="col-form-label">Password</label>
                <input type="password" class="d-block mw-auto w-100 form-fields form-control w-25" name="password" id="pwd" />
            </div>
            <div class="form-group">
                <label class="col-form-label">Address</label>
                <input type="text" class="form-control" name="address" id="Add" maxlength="30" />
            </div>
            <div class="form-group">
                <label class="col-form-label">Birthday</label>
                <input type="date" class="form-control" name="birthday" id="birthday" maxlength="30" />
            </div>
            <div class="form-group">
                <label>Lever</label>
                <select class="custom-select" name="lever" id="level">
                    <option value="">Select one</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
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
