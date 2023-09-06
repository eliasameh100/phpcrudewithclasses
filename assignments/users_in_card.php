<?php
include "../config/db-connect.php";
// sql query
$sql="SELECT * FROM 'post'";
//preparing our sql query from $pdo
$stmt=$pdo -> prepare($sql);
$stmt -> execute();
$post=$stmt -> fetchAll(PDO::FETCH_ASSOC);

?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/bootstrap.min">
        <title>POST</title>
    </head>
    <body>
        <div class="container mt-5 m-auto">
            <div class="row g-4">
                <?php foreach($posts as $post)
                {?>
                    <div class="col-md-3 col-lg-4 col-sm-12 shadow-lg">
                        <div class="card h-100 w-100 text-center">
                            <div class="card-body">
                                <h4 class="card=title"><?php echo $post['id'];?></h4>
                                <h4 class="caard-title"><?php echo $post['title'];?></h4>
                                <p class="card-text"><?php echo $post['body'];?></p>
                                <p class="card-text"><?php echo $post['create'];?></p>
                                <a href="" class="btn btn-success">READ More</a>
                            </div>
                        </div>
                    </div>
            <?php        
                }
                ?>
            </div>

        </div>
    </body>
    </html>