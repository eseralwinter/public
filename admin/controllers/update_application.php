<?php
    include $_SERVER["DOCUMENT_ROOT"] . "/class/ConnectDB.php";
    
    if($_GET['type'] == 'Завершено'){
        $sql = "UPDATE `application` SET `status` = '{$_GET['type']}' WHERE `id` = {$_GET['id']}";
    }elseif($_GET['type'] == 'Идёт обучение'){
        $sql = "UPDATE `application` SET `status` = '{$_GET['type']}' WHERE `id` = {$_GET['id']}";
    }elseif($_GET['type'] == 'Отменено'){
        $sql = "UPDATE `application` SET `status` = '{$_GET['type']}' WHERE `id` = {$_GET['id']}";
    };

    if($conn->query($sql)){
        header('location: /admin/');
        exit;
    }
?>