<main class="text-center">
    <h1>Создание</h1>
    <form action="/admin/customer/add" method="post" class="mt-4" enctype="multipart/form-data">
        <div class="d-flex flex-md-row">
            <label for="name" class="col">
                <h5>Имя</h5>
                <input name="name">
            </label>
        </div>
        <div class="d-flex flex-md-row">
            <label for="surname" class="col mt-4">
                <h5>Фамилия</h5>
                <input name="surname">
            </label>
        </div>
        <div class="d-flex flex-md-row">
            <label for="email" class="col mt-4">
                <h5>Почта</h5>
                <input name="email">
            </label>
        </div>
        <div class="d-flex flex-md-row">
            <label for="phone" class="col mt-4">
                <h5>Телефон</h5>
                <input name="phone" type="number">
            </label>
        </div>
        <div class="d-flex flex-md-row">
            <label for="login" class="col mt-4">
                <h5>Логин</h5>
                <input name="login">
            </label>
        </div>
        <div class="d-flex flex-md-row">
            <label for="password" class="col mt-4">
                <h5>Пароль</h5>
                <input type="password" name="password">
            </label>
        </div>
        <div class="d-flex flex-md-row">
            <label for="confirm" class="col mt-4">
                <h5>Повторите пароль</h5>
                <input type="password" name="confirm">
            </label>
        </div>
        <button type="submit" class="btn btn-primary mt-3" name="id">
            Create
        </button>
    </form>
</main>
