<?php 

require "../core/init.php";

if(!isLogged()){
    header("Location: /lifebook/index.php");
}

require "./views/home.view.php";