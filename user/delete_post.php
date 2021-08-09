<?php 
$title = "User home";
require "../core/init.php";

if(!isLogged()){
    header("Location: /lifebook/index.php");
}

$user = getUser($_SESSION['id']);
$posts = getAllPostsFromUser($user['id']);

$id = $_GET['id'];
if(deletePost($id)){
    if(unlink(ROOT."/uploads/".$_GET['image'])){
        // dd("Deleted");
    }else{
        // dd("Not deleted");
    }
    header('Location: all_posts.php');
}else{
    header("Location: /lifebook/error.php");
}

require "./views/home.view.php";