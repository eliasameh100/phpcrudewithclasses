<?php
  include_once "classes/Blog.php";
  $blog=new Blog();
  $posts=$blog->getAllPosts();
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
    <div class="container mt-3">
        <div class="row">
            <?php foreach($posts as $post){?>
                <div class="col-md-4 mt-5">
                    <div class="card text-center shadow-sm h-100 w-100">
                    <div class="card-body">
                    <img src="uploads/<?php echo $post['featured_image'];?>" class="img-fluid" alt="">
                        <h3><?php echo $post['title']?></h3>
                        <h5 class="text-truncate"><?php echo $post['body']?></h5>
                        <p><?php echo $post['create']?></p>
                        <a class="btn btn-success" href="post.php?id=<?php echo $post['id']?>">Read More</a>
                        <a name="delete" class="btn btn-danger" href="processes/deletepost.php?id=<?php echo $post['id']?>">Delete</a>
                        <a name="update" class="btn btn-secondary" href="create-post.php?id=<?php echo $post['id']?>">Update</a>
                    </div>
                    </div>
                </div>
                <?php
            }?>
        </div>
    </div>
</body>
</html>