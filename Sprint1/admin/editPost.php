<?php
$acc_id=$_GET['id'];
$sql="SELECT * FROM posts WHERE id=$acc_id";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
if (isset($_POST['sbm'])) {
    $title=$_POST['title'];
    $contentPost=$_POST['contentPost'];
    $sql = "UPDATE posts 
    SET title='$title',
        content = $contentPost
        WHERE id=$acc_id
    ";
    if(mysqli_query($conn,$sql)){
        header("location: index.php?category=managePost");
    }
    
}
?>
<div class="col-12 mt-5">
    <div class="card table-big-boy">
        <div class="card-header ">
            <h4 class="card-title">Edit Post</h4>
            <br />
        </div>
        <div class="card-body" id="newUserForm">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="<?php echo $row['title'] ?>"/>
            </div> 
            <div class="form-group">
                <label class="col-form-label">Content</label>
                <textarea rows="10" cols="150" name="contentPost" id="contentPost" class="form-control" placeholder="Here can be your description" value="<?php echo $row['content'] ?>"></textarea>
            </div>       
            <input type="submit" class="btn btn-info d-block ml-auto" id="newUserBtn" name="sbm" value="Perform" />
        </form>
        </div>
    </div>
</div>
