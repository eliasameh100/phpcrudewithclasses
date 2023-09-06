<?php
session_start();
if(isset($_GET['id'])){
    include "classes/Blog.php";
    $id=$_GET['id'];
    $blog=new Blog();
    $post=$blog->getPostById($id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create-post</title>
    <link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap.rtl.min.css">
</head>
<body>
    <?php
    if(isset($_SESSION['success'])){
        echo ($_SESSION['success']);
        unset ($_SESSION['success']);
    }
    if(isset($_SESSION['error'])){
        echo ($_SESSION['error']);
        unset ($_SESSION['error']);
    }
    ?>
    <form action="processes/process_createpost.php" type="" method="post" class="form-control" enctype="multipart/form-data">
    <div>
            <input hidden class="form-control" type="text" name="id" value="<?php if(!empty($post['id'])){ echo $post['id'];};?>">
        </div>
        <div>
            <input placeholder="title" class="form-control mb-5" type="text" name="title" value="<?php if(!empty($post['title'])){ echo $post['title'];};?>">
        </div>

        <div>
            <textarea name="body" id="" class="form-control" cols="30" rows="10" placeholder="Body"><?php if(!empty($post['body'])){ echo $post['body'];};?></textarea>
        </div>
        <div>
            <label>Passport</label>
            <input required type="file" name="featured_image" id="featured_image" class="form-control shadow-sm">
        </div>
        <div>
            <?php if(isset($_GET['id'])){ ?>
            <button class="form-control btn btn-secondary my-3" name="update" type="submit">Update</button>
            <?php } else {?>
            <button name="create" class="btn btn-success form-control my-1">Submit</button>
            <?php }?>
        </div>
    </form>
</body>
</html>