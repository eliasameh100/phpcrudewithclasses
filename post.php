<?php 
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
    <title>Document</title>
    <link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap.rtl.min.css">
</head>
<body>
    <?php
        include "assignments/navbar.php";
     ?>
    <div class="container">
        <img src="uploads/<?php echo $post['featured_image'];?>" class="img-fluid" alt="">
        <h3><?php echo $post['title'];?></h3>
        <h5><?php echo $post['body'];?></h5>
        <h6><?php echo $post['create'];?></h6>
    </div>
</body>
</html>