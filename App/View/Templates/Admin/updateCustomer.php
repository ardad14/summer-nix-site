<main class="text-center">
    <h1>Обновить</h1>
    <form action="/admin/customer/change" method="post" class="mt-5 justify-content-center">
        <div class="d-flex flex-md-row">
            <label for="name" class="col">
                <h5>Имя</h5>
                <input value="<?php echo $vars['customer'][0]->getName() ?>" name="name">
            </label>
        </div>
        <div class="d-flex flex-md-row">
            <label for="surname" class="col mt-4">
                <h5>Фамилия</h5>
                <input value="<?php echo $vars['customer'][0]->getSurname() ?>" name="surname">
            </label>
        </div>
        <div class="d-flex flex-md-row">
            <label for="email" class="col mt-4">
                <h5>Почта</h5>
                <input value="<?php echo $vars['customer'][0]->getEmail() ?>" name="email">
            </label>
        </div>
        <div class="d-flex flex-md-row">
            <label for="phone" class="col mt-4">
                <h5>Телефон</h5>
                <input type="number" value="<?php echo $vars['customer'][0]->getPhone() ?>" name="phone">
            </label>
        </div>
        <div class="d-flex flex-md-row">
            <label for="login" class="col mt-4">
                <h5>Логин</h5>
                <input value="<?php echo $vars['customer'][0]->getLogin() ?>" name="login">
            </label>
        </div>
        <div class="d-flex flex-md-row">
            <label for="role" class="col mt-4">
                <h5>Роль</h5>
                <input value="<?php echo $vars['customer'][0]->getRole() ?>" name="role">
            </label>
        </div>
        <button type="submit" class="btn btn-primary mb-5" value="<?php echo $vars['customer'][0]->getId() ?>" name="id">
            Update
        </button>
    </form>
    </div>
</main>
