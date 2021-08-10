<?php 
$title = "LifeBook";
require "core/init.php";

$categories = getCategories();

$post = getSinglePost($_GET['id']);
// get likes
$likes = getLikes($_GET['id']);
// comments
$comments = getPostComments($_GET['id']);


require "views/single_post.view.php";
