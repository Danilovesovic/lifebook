<?php 
$title = "User home";
require "../core/init.php";

if(!isLogged()){
    header("Location: /lifebook/index.php");
}

$user = getUser($_SESSION['id']);
$posts = getAllPostsFromUser($user['id']);


require "./views/home.view.php";