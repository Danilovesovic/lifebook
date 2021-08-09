<?php 
$title = "LifeBook";
require "core/init.php";

$categories = getCategories();

$post = getSinglePost($_GET['id']);
// get likes
// comments



require "views/single_post.view.php";
