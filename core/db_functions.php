<?php 

function register_user($title,$first_name,$last_name,$email,$password)
{
    global $db;
    $role = 'user';
    $password_hash = password_hash($password,PASSWORD_DEFAULT);
    $sql = $db->prepare("INSERT INTO users (title,first_name,
                            last_name, email, password, role) 
                            VALUES (?,?,?,?,?,?)");
    $sql->bind_param("ssssss",$title,$first_name,$last_name,$email,$password_hash,$role);
    $sql->execute();

    if($sql->errno == 0){
        $_SESSION['id'] = $sql->insert_id;
        header("Location: user/home.php");
    }else{
        header("Location: error.php");
    }
}

function isLogged()
{
    if(isset($_SESSION['id'])){
        return true;
    }else{
        return false;
    }
}

function login_user($email,$password)
{
    global $db;
    $user_password = getUserPassword($email);

    if(!$user_password){
        return false;
    }

    if(!password_verify($password,$user_password)){
        return false;
    }

    
    $sql = $db->prepare("SELECT id FROM users WHERE email=? AND password=?");
    $sql->bind_param("ss",$email,$user_password);
    $sql->execute();

    if($sql->errno == 0){
        $result = $sql->get_result();
        $id = $result->fetch_assoc()['id'];
        // LOGIN //
        $_SESSION['id'] = $id;
        return true;

    }else{
        header("Location: error.php");
    }

    
}

function getUserPassword($email)
{
    global $db;
    $sql = $db->prepare("SELECT password FROM users WHERE email=?");
    $sql->bind_param("s",$email);
    $sql->execute();

    $result = $sql->get_result(); // mysql result set
    if($result->num_rows == 0){
        return false;
    }
    $password = $result->fetch_assoc()['password'];

    return $password;

}

function getUser($id)
{
    global $db;
    $sql = $db->prepare("SELECT * FROM users WHERE id=?");
    $sql->bind_param("i",$id);
    $sql->execute();

    if($sql->errno == 0){
        $result = $sql->get_result();
        $user = $result->fetch_assoc();
      
        return $user;

    }else{
        header("Location: error.php");
    }
}

 function change_title($user)
{
    global $db;
    $title = "";
    if($user['title'] == "mr"){
        $title = "ms";
    }else{
        $title = "mr";
    }
    $sql = $db->prepare("UPDATE users SET title=? WHERE id=?");
    $sql->bind_param("si",$title,$user['id']);
    $sql->execute();

    if($sql->errno == 0){
        return true;
    }else{
        return false;
    }
}