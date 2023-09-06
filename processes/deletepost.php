<?php
if(isset($_GET['id'])){
    include "../classes/Blog.php";
    $id=$_GET['id'];
    $blog=new Blog();
    $post=$blog->deletePost($id);
    header('location:../posts.php');
}
?>