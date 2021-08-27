<main class="text-center">
    <?php if (isset($_SESSION['registrationError'])) echo $_SESSION['registrationError'] ?>
    <h2>Пользователи</h2>
    <form action="/admin/customer/addCustomerForm">
        <button class="btn btn-primary">Добавить пользователя</button>
    </form>
    <div class="album py-6 text-dark mt-5">
        <div class="container1">
            <div id="container" class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-3">
                <?php foreach($vars['customers'] as $customer): ?>
                    <div>
                        <div class="col-md-10 products-item border border-dark">
                                <div class="d-flex w-100 justify-content-center">
                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-3">
                                        <div class="col">
                                            <h4>Имя: <?php echo $customer->getName() ?></h4>
                                            <h4>Фамилия: <?php echo $customer->getSurname() ?></h4>
                                            <h4>Почта: <?php echo $customer->getEmail() ?></h4>
                                        </div>
                                        <div class="col">
                                            <h4>Телефон: <?php echo $customer->getPhone() ?></h4>
                                            <h4>Логин: <?php echo $customer->getLogin() ?></h4>
                                            <h4>Роль: <?php echo $customer->getRole() ?></h4>
                                        </div>

                                        <div class="d-flex w-100 flex-md-row justify-content-center">
                                            <form action="/admin/customer/update" method="GET">
                                                <button class="btn btn-success" type="submit" name="id" value="<?php echo $customer->getId() ?>">
                                                    Обновить
                                                </button>
                                            </form>
                                            <form action="/admin/customer/delete" method="POST">
                                                <button class="btn btn-danger" type="submit" name="id" value="<?php echo $customer->getId() ?>">
                                                    Удалить
                                                </button>
                                            </form>
                                        </div>
                                    </div>                                    <!--<div class="d-flex flex-md-column">
                                        <h4><?php /*echo $book->getPrice() . "грн" */?></h4>
                                        <h4><?php /*echo $book->getAmount() . "шт" */?></h4>
                                    </div>-->
                                </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>

