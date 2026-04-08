<?php
    include $_SERVER["DOCUMENT_ROOT"] . "/class/ConnectDB.php";
    
    $sql = sprintf("SELECT `login` FROM `user` WHERE `login` = '%s'",
        $_POST['login']
    );
    
    $result = $conn->query($sql);
    
    if($result->num_rows){
        header('Location: /register/?error=Пользователь с таким логином уже зарегистрирован');
        exit;
    }else{
        $sql = sprintf("INSERT INTO `user`(`name`, `surname`, `patronymic`, `phone`, `email`, `login`, `password`, `role`) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', 'Пользователь')",
            $_POST['name'],
            $_POST['surname'],
            $_POST['patronymic'],
            $_POST['phone'],
            $_POST['email'],
            $_POST['login'],
            $_POST['password']
        );
    }

    try{
        $result = $conn->query($sql);
    }catch(Exception $e){
        header('location: /register/?error=Непредвиденная ошибка');
        exit;
    }finally{    
        header('Location: /');
        exit;
    };
?>