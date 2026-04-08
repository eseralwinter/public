<?php
    session_start();
    include $_SERVER["DOCUMENT_ROOT"] . "/class/ConnectDB.php";
    
	if(isset($_POST['course']) and isset($_POST['date']) and isset($_POST['pay'])){
        $sql = sprintf("INSERT INTO `application`(`user_id`, `title`, `date`, `pay`, `status`) VALUES ('%s', '%s', '%s', '%s', 'Новая')", 
                $_SESSION['user_id'],
                $_POST['course'],
                $_POST['date'],
                $_POST['pay']
        );
    }else{
        header('location: /application/?error=Заполните все поля');
        exit;
    };

    try{
        $result = $conn->query($sql);
    }catch(Exception $e){
        header('location: /application/?error=Непредвиденная ошибка');
        exit;
    }finally{    
        header('location: /admin/');
        exit;
    }
?>
