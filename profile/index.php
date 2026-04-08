<?php
	session_start();

    if(!isset($_SESSION['login'])){
        header("Location: /");
        exit;
    } 

    include $_SERVER["DOCUMENT_ROOT"] . "/function/function.php";

    include $_SERVER["DOCUMENT_ROOT"] . "/include/header.php";
?>
    <section>
        <div class="container py-3">
            <h3 class="title">Личный кабинет</h3>
            <?php 
                echo FnOutCardProfile();
            ?>
            <div class="d-flex flex-column">
                <a href="/application/" class="btn btn-primary m-auto my-3 shadow-sm p-3 rounded-pill shadow-sm fw-bold">Сформировать заявку</a>
                <? if(isset($_SESSION['complete'])):?>
                    <button type="button" class="btn btn-primary my-3 shadow-sm p-3 m-auto fs-6 rounded-pill shadow-sm fw-bold" data-bs-toggle="modal" data-bs-target="#feedback">Оставить отзыв</button>
                <? endif; ?>
            </div>
            <div class="modal fade" id="feedback" aria-hidden="true" aria-labelledby="feedbackLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="feedbackLabel">Отзыв на качество услуг</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form class="form m-auto">
                            <div class="mb-3">
                                <label for="rating" class="form-label fs-5">Как вам качество предложенных услуг?</label>
                                <select class="form-control shadow-sm px-3 rounded-pill fs-5" id="rating" required>
                                    <option selected>Очень понравилось</option>
                                    <option>Скорее понравилось, чем нет</option>
                                    <option>Удовлетворительно</option>
                                    <option>Больше недостатков, чем достоинств</option>
                                    <option>Не понравилось</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="teaching_staff" class="form-label fs-5">Как вам преподавательский состав?</label>
                                <select class="form-control shadow-sm px-3 rounded-pill fs-5" id="teaching_staff" required>
                                    <option selected>Очень понравился</option>
                                    <option>Скорее понравился, чем нет</option>
                                    <option>Удовлетворительно</option>
                                    <option>Больше недостатков, чем достоинств</option>
                                    <option>Не понравился</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="comment" class="form-label fs-5">Расскажите о своих впечатлениях</label>
                                <textarea class="form-control" name="comment" rows="5" cols="50"></textarea>
                            </div>
                            <div class="d-flex flex-column">
                                <button type="button" class="btn btn-primary my-3 shadow-sm p-3 m-auto fs-6 rounded-pill fw-bold" data-bs-toggle="modal" data-bs-target="#answer">Оставить отзыв</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="answer" aria-hidden="true" aria-labelledby="answerLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
							<div class="modal-header">
								<h1 class="modal-title fs-5" id="answerLabel">Огромное спасибо за оставленный отзыв<br>Вы делаете наш портал лучше и эффективней</h1>
							</div>
							<div class="modal-footer">
                                <button class="btn btn-primary my-3 shadow-sm p-3 m-auto fs-6 rounded-pill fw-bold" data-bs-dismiss="modal" data-bs-toggle="modal">Закрыть</button>
                            </div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
    include $_SERVER["DOCUMENT_ROOT"] . "/include/footer.php"
?>