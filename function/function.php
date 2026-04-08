<?php
	session_start();
    include $_SERVER["DOCUMENT_ROOT"] . "/class/ConnectDB.php";

    function FnOutCardProfile(){
        global $conn;
        
        $sql = sprintf("SELECT `id`, `user_id`, `title`, `date`, `pay`, `status` FROM `application` WHERE `user_id` = '%s'",
            $_SESSION['user_id']
        );
        
        $result = $conn->query($sql);

        if(!$result->num_rows){
            $data = "<h4 class='display-6 text-center'>Заявок не найдено<h4>"; 
        }else{
            $data = "<div class='cards row row-cols-1 row-cols-md-3 g-4'>";
            
            foreach($result as $card){
                if($card['status'] == "Новая"){
                    $data .= sprintf("<div class='col'>
                                <div class='card mb-3 border-primary border-2'>
                                    <div class='card-body'>
                                        <h5 class='card-title fs-3'>Заявка №%s</h5>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Статус заявки</span>: %s
                                        </p>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Наименование курса</span>: %s
                                        </p>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Дата начала обучения</span>: %s
                                        </p>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Способ оплаты</span>: %s
                                        </p>
                                    </div>
                                </div>
                            </div>",
                            $card['id'],
                            $card['status'],
                            $card['title'],
                            $card['date'],
                            $card['pay']
                    );
                }elseif($card['status'] == "Идёт обучение"){
                    $data .= sprintf("<div class='col'>
                                <div class='card mb-3 border-warning border-2'>
                                    <div class='card-body'>
                                        <h5 class='card-title fs-3'>Заявка №%s</h5>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Статус заявки</span>: %s
                                        </p>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Наименование курса</span>: %s
                                        </p>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Дата начала обучения</span>: %s
                                        </p>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Способ оплаты</span>: %s
                                        </p>
                                    </div>
                                </div>
                            </div>",
                            $card['id'],
                            $card['status'],
                            $card['title'],
                            $card['date'],
                            $card['pay']
                    );
                }elseif($card['status'] == "Завершено"){

                    $_SESSION['complete'] = TRUE;

                    $data .= sprintf("<div class='col'>
                                <div class='card mb-3 border-success border-2'>
                                    <div class='card-body'>
                                        <h5 class='card-title fs-3'>Заявка №%s</h5>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Статус заявки</span>: %s
                                        </p>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Наименование курса</span>: %s
                                        </p>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Дата начала обучения</span>: %s
                                        </p>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Способ оплаты</span>: %s
                                        </p>
                                    </div>
                                </div>
                            </div>",
                            $card['id'],
                            $card['status'],
                            $card['title'],
                            $card['date'],
                            $card['pay']
                    );
                }elseif($card['status'] == "Отменено"){
                    $data .= sprintf("<div class='col'>
                                <div class='card mb-3 text-body-tertiary border-2 '>
                                    <div class='card-body'>
                                        <h5 class='card-title fs-3'>Заявка №%s</h5>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Статус заявки</span>: %s
                                        </p>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Наименование курса</span>: %s
                                        </p>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Дата начала обучения</span>: %s
                                        </p>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Способ оплаты</span>: %s
                                        </p>
                                    </div>
                                </div>
                            </div>",
                            $card['id'],
                            $card['status'],
                            $card['title'],
                            $card['date'],
                            $card['pay']
                    );
                }
            };    
            $data .= "</div>";
        };
        
        return $data;
    };

    function FnOutCardAdmin(){
        
        global $conn;
        
        $sql = "SELECT `application`.`id`, `user_id`, `title`, `date`, `pay`, `status`, `user`.`name`, `user`.`surname`, `user`.`patronymic`, `user`.`phone`, `user`.`email` FROM `application` INNER JOIN `user` ON `application`.`user_id` = `user`.`id` ORDER BY `id` DESC";
        
        $result = $conn->query($sql);

        if(!$result->num_rows){
            $data = "<h4 class='display-6 text-center'>Заявок не найдено<h4>"; 
        }else{
            $data = "<div class='cards row row-cols-1 row-cols-md-3 g-4'>";
            
            foreach($result as $card){
                if($card['status'] == "Новая"){
                    $data .= sprintf("<div class='col'>
                                <div class='card mb-3 border-primary border-2'>
                                    <div class='card-body'>
                                        <h5 class='card-title fs-3'>Заявка №%s</h5>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Статус заявки</span>: %s
                                        </p>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Фамилия</span>: %s
                                        </p>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Имя</span>: %s
                                        </p>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Отчество</span>: %s
                                        </p>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Телефон</span>: %s
                                        </p>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>E-mail</span>: %s
                                        </p>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Наименование курса</span>: %s
                                        </p>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Дата начала обучения</span>: %s
                                        </p>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Способ оплаты</span>: %s
                                        </p>
                                    </div>
                                    <div class='buttons d-flex justify-content-center flex-wrap mb-3'>
                                        <a href='/admin/controllers/update_application.php?id=%s&type=Идёт обучение' class='btn btn-outline-warning p-2 w-75 rounded-3 shadow-sm fw-bold fs-6 my-2'>Подтвердить обучение</a>
                                        <a href='/admin/controllers/update_application.php?id=%s&type=Отменено' class='btn btn-outline-danger p-2 w-75 rounded-3 shadow-sm fw-bold fs-6 my-2'>Отменить</a>
                                    </div>
                                </div>
                            </div>",
                            $card['id'],
                            $card['status'],
                            $card['surname'],
                            $card['name'],
                            $card['patronymic'],
                            $card['phone'],
                            $card['email'],
                            $card['title'],
                            $card['date'],
                            $card['pay'],
                            $card['id'],
                            $card['id']
                    );
                }elseif($card['status'] == "Идёт обучение"){
                    $data .= sprintf("<div class='col'>
                            <div class='card mb-3 border-warning border-2'>
                                <div class='card-body'>
                                    <h5 class='card-title fs-3'>Заявка №%s</h5>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Статус заявки</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Фамилия</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Имя</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Отчество</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Телефон</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>E-mail</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Наименование курса</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Дата начала обучения</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Способ оплаты</span>: %s
                                    </p>
                                </div>
                                <div class='buttons d-flex justify-content-center flex-wrap mb-3'>
                                    <a href='/admin/controllers/update_application.php?id=%s&type=Завершено' class='btn btn-outline-success p-2 w-75 rounded-3 shadow-sm fw-bold fs-6 my-2'>Завершить</a>
                                    <a href='/admin/controllers/update_application.php?id=%s&type=Отменено' class='btn btn-outline-danger p-2 w-75 rounded-3 shadow-sm fw-bold fs-6 my-2'>Отменить</a>
                                </div>
                            </div>
                        </div>",
                        $card['id'],
                        $card['status'],
                        $card['surname'],
                        $card['name'],
                        $card['patronymic'],
                        $card['phone'],
                        $card['email'],
                        $card['title'],
                        $card['date'],
                        $card['pay'],
                        $card['id'],
                        $card['id']
                    );
                }elseif($card['status'] == "Завершено"){
                    $data .= sprintf("<div class='col'>
                                <div class='card mb-3 border-success border-2'>
                                    <div class='card-body'>
                                        <h5 class='card-title fs-3'>Заявка №%s</h5>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Статус заявки</span>: %s
                                        </p>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Фамилия</span>: %s
                                        </p>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Имя</span>: %s
                                        </p>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Отчество</span>: %s
                                        </p>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Телефон</span>: %s
                                        </p>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>E-mail</span>: %s
                                        </p>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Наименование курса</span>: %s
                                        </p>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Дата начала обучения</span>: %s
                                        </p>
                                        <p class='card-text mb-2'>
                                            <span class='fw-semibold'>Способ оплаты</span>: %s
                                        </p>
                                    </div>
                                </div>
                            </div>",
                            $card['id'],
                            $card['status'],
                            $card['surname'],
                            $card['name'],
                            $card['patronymic'],
                            $card['phone'],
                            $card['email'],
                            $card['title'],
                            $card['date'],
                            $card['pay']
                    );
                }elseif($card['status'] == "Отменено"){
                    $data .= sprintf("<div class='col'>
                            <div class='card mb-3 text-body-tertiary border-2 '>
                                <div class='card-body'>
                                    <h5 class='card-title fs-3'>Заявка №%s</h5>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Статус заявки</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Фамилия</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Имя</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Отчество</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Телефон</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>E-mail</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Наименование курса</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Дата начала обучения</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Способ оплаты</span>: %s
                                    </p>
                                </div>
                            </div>
                        </div>",
                        $card['id'],
                        $card['status'],
                        $card['surname'],
                        $card['name'],
                        $card['patronymic'],
                        $card['phone'],
                        $card['email'],
                        $card['title'],
                        $card['date'],
                        $card['pay']
                    );
                }
            };    
            $data .= "</div>";
        };
        
        return $data;
    };
    function FnOutCardAdminInSorting($status){

        global $conn;
        
        $sql = "SELECT `application`.`id`, `user_id`, `title`, `date`, `pay`, `status`, `user`.`name`, `user`.`surname`, `user`.`patronymic`, `user`.`phone`, `user`.`email` FROM `application` INNER JOIN `user` ON `application`.`user_id` = `user`.`id` WHERE `status` = '{$status}' ORDER BY `application`.`id` DESC";
        
        $result = $conn->query($sql);
        
        if(!$result->num_rows){
            if($status == "Новая"){
                $data = "<h4 class='display-6 text-center'>Новых заявок не найдено<h4>";
            }elseif($status == "Завершено"){
                $data = "<h4 class='display-6 text-center'>Завершённых заявок не найдено<h4>";
            }elseif($status == "Идёт обучение"){
                $data = "<h4 class='display-6 text-center'>Заявок в процесссе обучения не найдено<h4>";
            }elseif($status == "Отменено"){
                $data = "<h4 class='display-6 text-center'>Отменённых заявок не найдено<h4>";
            }
        }else{
            $data = "<div class='cards row row-cols-1 row-cols-md-3 g-4'>";
            foreach($result as $card){
                if($card['status'] == "Новая"){
                    $data .= sprintf("<div class='col'>
                            <div class='card mb-3 border-primary border-2'>
                                <div class='card-body'>
                                    <h5 class='card-title fs-3'>Заявка №%s</h5>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Статус заявки</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Фамилия</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Имя</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Отчество</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Телефон</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>E-mail</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Наименование курса</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Дата начала обучения</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Способ оплаты</span>: %s
                                    </p>
                                </div>
                                <div class='buttons d-flex justify-content-center flex-wrap mb-3'>
                                    <a href='/admin/controllers/update_application.php?id=%s&type=Идёт обучение' class='btn btn-outline-warning p-2 w-75 rounded-3 shadow-sm fw-bold fs-6 my-2'>Подтвердить обучение</a>
                                    <a href='/admin/controllers/update_application.php?id=%s&type=Отменено' class='btn btn-outline-danger p-2 w-75 rounded-3 shadow-sm fw-bold fs-6 my-2'>Отменить</a>
                                </div>
                            </div>
                        </div>",
                        $card['id'],
                        $card['status'],
                        $card['surname'],
                        $card['name'],
                        $card['patronymic'],
                        $card['phone'],
                        $card['email'],
                        $card['title'],
                        $card['date'],
                        $card['pay'],
                        $card['id'],
                        $card['id']
                    );
                }elseif($card['status'] == "Завершено"){
                    $data .= sprintf("<div class='col'>
                            <div class='card mb-3 border-success border-2'>
                                <div class='card-body'>
                                    <h5 class='card-title fs-3'>Заявка №%s</h5>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Статус заявки</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Фамилия</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Имя</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Отчество</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Телефон</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>E-mail</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Наименование курса</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Дата начала обучения</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Способ оплаты</span>: %s
                                    </p>
                                </div>
                            </div>
                        </div>",
                        $card['id'],
                        $card['status'],
                        $card['surname'],
                        $card['name'],
                        $card['patronymic'],
                        $card['phone'],
                        $card['email'],
                        $card['title'],
                        $card['date'],
                        $card['pay']
                    );   
                }elseif($card['status'] == "Идёт обучение"){
                    $data .= sprintf("<div class='col'>
                            <div class='card mb-3 border-warning border-2'>
                                <div class='card-body'>
                                    <h5 class='card-title fs-3'>Заявка №%s</h5>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Статус заявки</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Фамилия</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Имя</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Отчество</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Телефон</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>E-mail</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Наименование курса</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Дата начала обучения</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Способ оплаты</span>: %s
                                    </p>
                                </div>
                                <div class='buttons d-flex justify-content-center flex-wrap mb-3'>
                                    <a href='/admin/controllers/update_application.php?id=%s&type=Завершено' class='btn btn-outline-success p-2 w-75 rounded-3 shadow-sm fw-bold fs-6 my-2'>Завершить</a>
                                    <a href='/admin/controllers/update_application.php?id=%s&type=Отменено' class='btn btn-outline-danger p-2 w-75 rounded-3 shadow-sm fw-bold fs-6 my-2'>Отменить</a>
                                </div>
                            </div>
                        </div>",
                        $card['id'],
                        $card['status'],
                        $card['surname'],
                        $card['name'],
                        $card['patronymic'],
                        $card['phone'],
                        $card['email'],
                        $card['title'],
                        $card['date'],
                        $card['pay'],
                        $card['id'],
                        $card['id']
                    );
                }elseif($card['status'] == "Отменено"){
                    $data .= sprintf("<div class='col'>
                            <div class='card mb-3 text-body-tertiary border-2 '>
                                <div class='card-body'>
                                    <h5 class='card-title fs-3'>Заявка №%s</h5>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Статус заявки</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Фамилия</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Имя</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Отчество</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Телефон</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>E-mail</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Наименование курса</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Дата начала обучения</span>: %s
                                    </p>
                                    <p class='card-text mb-2'>
                                        <span class='fw-semibold'>Способ оплаты</span>: %s
                                    </p>
                                </div>
                            </div>
                        </div>",
                        $card['id'],
                        $card['status'],
                        $card['surname'],
                        $card['name'],
                        $card['patronymic'],
                        $card['phone'],
                        $card['email'],
                        $card['title'],
                        $card['date'],
                        $card['pay']
                    );
                }
            }
            $data .= "</div>";
        }
        
        return $data;

    };
?>
