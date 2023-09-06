<?php
if(((isset($_POST['create']))) || (isset($_POST['update']))){
    session_start();
    include_once '../classes/Blog.php';
    $blog=new Blog();

    $title=$_POST['title'];
    $body=$_POST['body'];
    $id=$_POST['id'];
    $featured_image=$_POST['featured_image'];
    $featured_image_name=$_FILES['featured_image']['name'];
    $allowed_ext=['png','jpg','jpeg','gif'];
    $featured_image_size=$_FILES['featured_image']['size'];
    $featured_image_tmp=$_FILES['featured_image']['tmp_name'];
    $featured_image_ext=explode('.',$featured_image_name);
    $featured_image_ext=strtolower(end($featured_image_ext));
    $featured_image_name=time().'.'.$featured_image_ext;
    $target_dir="../uploads/{$featured_image_name}";

    if(isset($_POST['create'])){
        if(!in_array($featured_image_ext,$allowed_ext)){
            $result1=$blog->createPost($title,$body,$featured_image);
            $_SESSION['error']="Invalid File Type";
            header("location:../create-post.php");
            exit();
        }
        if($featured_image_size > 1000000){
            $_SESSION['error']="file too large";
            header("location:../create-post.php");
            exit();
        };



        move_uploaded_file($featured_image_tmp, $target_dir);

        if($result1){
            $_SESSION['success']='Post Created Successfully';
            header("location:../posts.php");
        }else{
            $_SESSION['error']='Error creating post';
            header("location:../create-post.php");
        }
    }
    if(isset($_POST['update'])){
        if(!empty($featured_image_ext)){
            $result = $blog->updatePostWithoutImage($title, $body, $id);
        }else{
            if(!in_array($featured_image_ext,$allowed_ext)){
                $_SESSION['error']='Invalid File';
                header("location:../create-post.php");
                exit();
            };
            
            if($featured_image_size > 1000000){
                $_SESSION['error']="file too large";
                header("location:../create-post.php");
                exit();
            };
            $update=$blog->updatePostWithImage($title, $body, $featured_image, $id);

            move_uploaded_file($featured_image_tmp, $target_dir);
        }

        if($update){
            $_SESSION["success"]='post updated successfully';
            header("location: ../posts.php");
        }else{
            $_SESSION['error']='error updating post';
            header('location: ../create-posts.php');
        }
    }
}
?>