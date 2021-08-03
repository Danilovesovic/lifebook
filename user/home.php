<?php 

require "../core/init.php";

if(!isLogged()){
    header("Location: /lifebook/index.php");
}

echo "User Home";