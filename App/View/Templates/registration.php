<main class="text-center">
    <?php if (isset($_SESSION['registrationError'])) echo $_SESSION['registrationError'] ?>
    <div class="container">
        <div class="row main-form">
            <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>
            <form method="POST" action="/verification">
                <div class=" mt-3 d-flex flex-md-column justify-content-center align-items-center">
                    <label for="name" class="col-md-2 control-label">Имя</label>
                    <div class="col-md-5">
                        <div class="input-group col">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Имя"/>
                        </div>
                    </div>
                </div>
                <div class=" mt-3 d-flex flex-md-column justify-content-center align-items-center">
                    <label for="name" class="col-md-2 control-label">Фамилия</label>
                    <div class="col-md-5">
                        <div class="input-group col">
                            <input type="text" class="form-control" name="surname" id="name" placeholder="Фамилия"/>
                        </div>
                    </div>
                </div>
                <div class=" mt-3 d-flex flex-md-column justify-content-center align-items-center">
                    <label for="email" class="col-md-2 control-label">Email</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email"/>
                        </div>
                    </div>
                </div>
                <div class=" mt-3 d-flex flex-md-column justify-content-center align-items-center">
                    <label for="email" class="col-md-2 control-label">Телефон</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Номер телефона"/>
                        </div>
                    </div>
                </div>
                <div class=" mt-3 d-flex flex-md-column justify-content-center align-items-center">
                    <label for="username" class="col-md-2 control-label">Логин</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <input type="text" class="form-control" name="login" id="login" placeholder="Логин"/>
                        </div>
                    </div>
                </div>
                <div class=" mt-3 d-flex flex-md-column justify-content-center align-items-center">
                    <label for="password" class="col-md-2 control-label">Пароль</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Пароль"/>
                        </div>
                    </div>
                </div>
                <div class=" mt-3 d-flex flex-md-column justify-content-center align-items-center">
                    <label for="confirm" class="col-md-2 control-label">Подтверждение пароля</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <input type="password" class="form-control" name="confirm" id="confirm" placeholder="Подтвердите пароль"/>
                        </div>
                    </div>
                </div>
                <button class="btn btn-lg btn-primary btn-block mt-5" type="submit">Зарегистрироваться</button>
            </form>
        </div>
    </div>
</main>

