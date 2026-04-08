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
            <h3 class="title">Вход</h3>
            <form action="/admin/controllers/login.php" method="post" class="form m-auto">
                <div class="mb-3">
                    <label for="login" class="form-label fs-6">Ваш логин</label>
                    <input type="text" class="form-control shadow-sm px-3 rounded-pill fs-5" id="login" name="login" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label fs-6">Ваш пароль</label>
                    <input type="password" class="form-control shadow-sm px-3 rounded-pill fs-5" id="password" name="password" required>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary my-3 shadow-sm p-3 fs-6 rounded-pill shadow-sm fw-bold">Войти</button>
                </div>
                <p>Ещё не зарегистрировались? <a href="/register/">Зарегистрируйтесь здесь</a><p>
            </form>
        </div>
    </section>

<?php
    include $_SERVER["DOCUMENT_ROOT"] . "/include/footer.php"
?>