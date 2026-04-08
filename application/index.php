<?php
	session_start();

    if(!isset($_SESSION['login'])){
        header("Location: /");
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
            <h3 class="title">Подача заявки</h3>
            <div id="CarouselAdvantages" class="carousel slide" data-bs-ride="carousel">
                <h4 class="text-center display-6 mt-3 mb-5">Мы предоставляем современные классы для эффективного обучения</h4>
                <div class="carousel-inner m-auto">
                    <div class="carousel-item active" data-bs-interval="3000">
                        <img src="/assets/media/slider1.jpg" class="d-block w-100" alt="Кабинет 1">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="/assets/media/slider2.jpg" class="d-block w-100" alt="Кабинет 2">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="/assets/media/slider3.jpg" class="d-block w-100" alt="Кабинет 3">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="/assets/media/slider4.jpg" class="d-block w-100" alt="Кабинет 4">
                    </div>
                </div>
                <button class="carousel-btn carousel-control-prev text-bg-primary rounded-pill" type="button" data-bs-target="#CarouselAdvantages" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-btn carousel-control-next text-bg-primary rounded-pill" type="button" data-bs-target="#CarouselAdvantages" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <form action="/admin/controllers/add_application.php" method="post" class="form m-auto">
                <div class="mb-3 mt-5">
                    <label for="course" class="form-label fs-6">Выберите курс</label>
                    <select class="form-control shadow-sm px-3 rounded-pill fs-5" id="course" name="course" required>
                        <option disabled selected hidden>Выберите курс из списка</option>
                        <option value="Основы алгоритмизации и программирования">Основы алгоритмизации и программирования</option>
                        <option value="Основы веб-дизайна">Основы веб-дизайна</option>
                        <option value="Основы проектирования баз данных">Основы проектирования баз данных</option>
                    </select>
                </div>
                <div class="mb-3">
                <label for="date" class="form-label fs-6">Укажите начало обучения</label>
                    <input type="date" class="form-control shadow-sm px-3 rounded-pill fs-5" id="date" name="date" onkeydown="return false" required>
                </div>
               	<div class="mb-3">
                    <label for="pay" class="form-label fs-6">Укажите способ оплаты</label>
                    <select class="form-control shadow-sm px-3 rounded-pill fs-5" id="pay" name="pay" required>
                        <option disabled selected hidden>Выберите способ оплаты</option>
                        <option value="Наличными">Наличными</option>
                        <option value="Перевод по номеру телефона">Перевод по номеру телефона</option>
                    </select>
                </div>
                <div class="d-flex flex-column m-auto">
                    <button class="btn btn-primary my-3 shadow-sm p-3 m-auto fs-6 rounded-pill shadow-sm fw-bold">Сформировать заявку</button>
                </div>  
            </form>
        </div>
    </section>
<?php
    include $_SERVER["DOCUMENT_ROOT"] . "/include/footer.php"
?>