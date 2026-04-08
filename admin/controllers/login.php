<?
    session_start();
    include $_SERVER["DOCUMENT_ROOT"] . "/class/ConnectDB.php";
    
    $sql = sprintf("SELECT `id`, `login`, `password`, `role` FROM `user` WHERE `login` = '%s' AND `password` = '%s'",
        $_POST["login"],
        $_POST["password"]
    );
    
    $result = $conn->query($sql);
    
    if(!$result->num_rows){
        header('Location: /?error=Неверный пароль или логин');
        exit;
    }else{
        $user = $result->fetch_assoc();
        
        $_SESSION['login'] = $user['login'];
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        
        if($user['role'] == 'Администратор'){
            header('Location: /admin/');
            exit;
        }else{
            header('Location: /profile/');
            exit;
        }
    }
?>