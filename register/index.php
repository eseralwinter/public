<?php
	session_start();

    if(isset($_SESSION['login'])){
        header("Location: /profile/");
        exit;
    } 

    include $_SERVER["DOCUMENT_ROOT"] . "/include/header.php";
?>
    <section>
        <div class="container py-3">
            <?php
                if(isset($_GET['error'])){
                    echo "<div class='border border-danger text-danger text-center p-3 mx-auto my-1'>
                        {$_GET['error']}
                    </div>";
                }
            ?>
            <h3 class="title">Регистрация</h3>
            <form action="/admin/controllers/registration.php" method="post" class="form m-auto needs-validation" novalidate>
                <div class="mb-3">
                    <label for="surname" class="form-label fs-6">Фамилия</label>
                    <input type="text" class="form-control shadow-sm px-3 rounded-pill fs-5" id="surname" name="surname" pattern="[а-яА-ЯЁё\s]{2,30}" required>
                    <div id="surnameHelp" class="form-text fs-6">
                        Кириллица и пробелы, от 2 до 30 символов
                    </div>
                    <div class="invalid-feedback fs-6">
                        Проверьте введенные данные
                    </div>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label fs-6">Имя</label>
                    <input type="text" class="form-control shadow-sm px-3 rounded-pill fs-5" id="name" name="name" pattern="[а-яА-ЯЁё\s]{2,25}" required>
                    <div id="nameHelp" class="form-text fs-6">
                        Кириллица и пробелы, от 2 до 25 символов
                    </div>
                    <div class="invalid-feedback fs-6">
                        Проверьте введенные данные
                    </div>
                </div>
                <div class="mb-3">
                    <label for="patronymic" class="form-label fs-6">Отчество</label>
                    <input type="text" class="form-control shadow-sm px-3 rounded-pill fs-5" id="patronymic" name="patronymic" pattern="[а-яА-ЯЁё\s]{2,40}" required>
                    <div id="patronymicHelp" class="form-text fs-6">
                        Кириллица и пробелы, от 2 до 40 символов
                    </div>
                    <div class="invalid-feedback fs-6">
                        Проверьте введенные данные
                    </div>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label fs-6">Телефон</label>
                    <input type="tel" class="form-control shadow-sm px-3 rounded-pill fs-5" id="phone" name="phone" pattern="^8\(\d{3}\)\d{3}-\d{2}-\d{2}$" minlength="15" maxlength="15" required>
                    <div id="phoneHelp" class="form-text fs-6">
                        Формат: 8(XXX)XXX-XX-XX
                    </div>
                    <div class="invalid-feedback fs-6">
                        Проверьте введенные данные
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label fs-6">E-mail</label>
                    <input type="email" class="form-control shadow-sm px-3 rounded-pill fs-5" id="email" name="email" required>
                    <div id="emailHelp" class="form-text fs-6">
                        Формат: name@gmail.com
                    </div>
                    <div class="invalid-feedback fs-6">
                        Проверьте введенные данные
                    </div>
                </div>
                <div class="mb-3">
                    <label for="login" class="form-label fs-6">Логин</label>
                    <input type="text" class="form-control shadow-sm px-3 rounded-pill fs-5" id="login" name="login" minlength="2" pattern="[a-zA-Z]{2,25}" required>
                    <div id="loginHelp" class="form-text fs-6">
                        Латиница и пробелы, от 2 до 25 символов
                    </div>
                    <div class="invalid-feedback fs-6">
                        Проверьте введенные данные
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label fs-6">Пароль</label>
                    <input type="password" class="form-control shadow-sm px-3 rounded-pill fs-5" id="password" name="password" minlength="8" required>
                    <div id="passwordHelp" class="form-text fs-6">
                        Любые символы, от 8 до 25 символов
                    </div>
                    <div class="invalid-feedback fs-6">
                        Проверьте введенные данные
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary my-3 shadow-sm p-3 fs-6 rounded-pill fw-bold">Зарегистрироваться</button>
                </div>
                <p>Уже зарегистрированы? <a href="/">Войти</a><p>
            </form>
        </div>
    </section>

<?php
    include $_SERVER["DOCUMENT_ROOT"] . "/include/footer.php"
?>