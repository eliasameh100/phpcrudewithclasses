<?php
class Blog{
    //  Function for inseting post
    public function createPost($title,$body,$featured_image){
        include "config/db-connect.php";
        $sql = "INSERT INTO post (title, body, featured_image) VALUES (?, ?, ?,)";
        $stmt = $pdo->prepare($sql);
        $insert = $stmt->execute([$title, $body, $featured_image]);
        return $insert;
    }

    // function to get all the posts
    public function getAllPosts(){
        include "config/db-connect.php";
        $sql = "SELECT * FROM post ORDER BY id DESC";
        $stmt = $pdo->prepare($sql);
        $stmt -> execute();
        $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $all;
    }
    // Getting post by id
    public function getPostById($id){
        include "config/db-connect.php";
        $sql="SELECT * FROM post WHERE id=?";
        $stmt=$pdo->prepare($sql);
        $stmt->execute([$id]);
        $by_id=$stmt->fetch(PDO::FETCH_ASSOC);
        return $by_id;
    }
    // Updating post with image
    public function updatePostWithImage($title,$body,$featured_image,$id){
        include "../config/db-connect.php";
        $sql="UPDATE post SET title=?, body=?, featured_image=? WHERE id=?";
        $stmt=$pdo->prepare($sql);
        $update=$stmt->execute([$title, $body, $featured_image, $id]);
        return $update;
    }
    // updating post without image
    public function updatePostWithoutImage($title,$body,$id){
        include "../config/db-connect.php";
        $sql="UPDATE post SET title=?, body=? WHERE id=?";
        $stmt=$pdo->prepare($sql);
        $update=$stmt->execute([$title, $body, $id]);
        return $update;
    }
    // Delete Function
    public function deletePost($id){
        include "../config/db-connect.php";
        $sql="DELETE FROM post WHERE id=$id";
        $stmt=$pdo->prepare($sql);
        $delete=$stmt->execute([$id]);
        return $delete;
    }

}
?>