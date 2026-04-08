<?php
    session_start();
    $menu = "";
    if(isset($_SESSION['login'])){
        if($_SESSION['role'] == "Администратор"){
            $menu .= '<li class="nav-item">
                        <a class="nav-link fs-5" href="/admin/">Панель администратора</a>
                      </li>';
        }
        $menu .= '<li class="nav-item">
                    <a class="nav-link fs-5" href="/profile/">Личный кабинет</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link fs-5" href="/admin/controllers/logout.php">Выйти</a>
                  </li>';
    }else{
        $menu = '<li class="nav-item">
                    <a class="nav-link fs-5" href="/">Вход</a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link fs-5" href="/register/">Регистрация</a>
                 </li>';
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корочки есть</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/style/style.css">
</head>
<body>
    <main>
        <header>
                <!-- начало вставки из Zeal -->
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="/">
                            <img src="/assets/media/logo.svg" alt="Logo" width="50" height="50" class="d-inline-block">
                            Корочки есть
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <?=$menu?>
                            </ul>
                        </div>
                    </div>
                </nav>
        </header>
