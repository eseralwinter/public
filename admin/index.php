<?php
    session_start();

    if(!isset($_SESSION['login'])){
        header("Location: /");
        exit;
    }
    
    if($_SESSION['role'] != "Администратор"){
        header("Location: /profile/");
        exit;
    }

    include $_SERVER["DOCUMENT_ROOT"] . "/function/function.php";
    
    include $_SERVER["DOCUMENT_ROOT"] . "/include/header.php";
?>
    <section class="content">
        <div class="container py-3">
            <h3 class="title admin-title">Панель администратора</h3>
            <div class="nav-btn-and-cards">
                <div class="nav nav-btn flex-column nav-pills" id="v-pills-tab" role="tablist">
                    <button class="nav-link active fs-4 fs-sm-5" id="v-pills-all-tab" data-bs-toggle="pill" data-bs-target="#v-pills-all" type="button" role="tab" aria-controls="v-pills-all" aria-selected="true">Все заявки</button>
                    <button class="nav-link fs-4 fs-sm-5" id="v-pills-new-tab" data-bs-toggle="pill" data-bs-target="#v-pills-new" type="button" role="tab" aria-controls="v-pills-new" aria-selected="false">Новые заявки</button>
                    <button class="nav-link fs-4 fs-sm-5" id="v-pills-canceled-tab" data-bs-toggle="pill" data-bs-target="#v-pills-canceled" type="button" role="tab" aria-controls="v-pills-canceled" aria-selected="false">Отмененные заявки</button>
                    <button class="nav-link fs-4 fs-sm-5" id="v-pills-сompleted-tab" data-bs-toggle="pill" data-bs-target="#v-pills-сompleted" type="button" role="tab" aria-controls="v-pills-сompleted" aria-selected="false">Завершённые заявки</button>
                    <button class="nav-link fs-4 fs-sm-5" id="v-pills-process-tab" data-bs-toggle="pill" data-bs-target="#v-pills-process" type="button" role="tab" aria-controls="v-pills-process" aria-selected="false">Заявки в процессе</button>
                </div>
                <div class="tab-content nav-cards" id="v-pills-tabContent">
                    <div class="tab-pane fade active show" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab" tabindex="0"><?=FnOutCardAdmin()?></div>
                    <div class="tab-pane fade" id="v-pills-new" role="tabpanel" aria-labelledby="v-pills-new-tab" tabindex="0"><?=FnOutCardAdminInSorting('Новая')?></div>
                    <div class="tab-pane fade" id="v-pills-canceled" role="tabpanel" aria-labelledby="v-pills-canceled-tab" tabindex="0"><?=FnOutCardAdminInSorting('Отменено')?></div>
                    <div class="tab-pane fade" id="v-pills-сompleted" role="tabpanel" aria-labelledby="v-pills-сompleted-tab" tabindex="0"><?=FnOutCardAdminInSorting('Завершено')?></div>
                    <div class="tab-pane fade" id="v-pills-process" role="tabpanel" aria-labelledby="v-pills-process-tab" tabindex="0"><?=FnOutCardAdminInSorting('Идёт обучение')?></div>
                </div>
            </div>
        </div>
    </section>

<?php
    include $_SERVER["DOCUMENT_ROOT"] . "/include/footer.php"
?>
