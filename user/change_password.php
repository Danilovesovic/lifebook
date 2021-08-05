<?php 

$title = "Change password";
require "../core/init.php";

if(!isLogged()){
    header("Location: /lifebook/index.php");
}

$user = getUser($_SESSION['id']);

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $errors = [];
  
    if(!isset($_POST['password']) || empty($_POST['password'])){
        $password_error = "password is required";
        array_push($errors,$password_error);
    }else{
        $password = $_POST['password'];
    }
    if(!isset($_POST['new_password']) || empty($_POST['new_password'])){
        $new_password_error = "new_password is required";
        array_push($errors,$new_password_error);
    }else{
        $new_password = $_POST['new_password'];
    }
    if(!isset($_POST['new_password_repeat']) || empty($_POST['new_password_repeat'])){
        $new_password_repeat_error = "new_password_repeat is required";
        array_push($errors,$new_password_repeat_error);
    }else{
        $new_password_repeat = $_POST['new_password_repeat'];
    }

    if(count($errors) == 0){
        if(change_email($email,$user['id'])){
            header('Location: account.php');
        }else{
            $wrong = "Something went wrong";
        }
    }
}

require "./views/change_password.view.php";