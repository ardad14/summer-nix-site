<main class="text-center">
    <?php if (isset($_SESSION['adminWrongCredentials'])) echo $_SESSION['adminWrongCredentials'] ?>
    <form action="admin/auth" method="post" class="form-signin justify-content-center">

        <h1 class="h3 mb-3 font-weight-normal">Войти</h1>
        <div class="d-flex flex-md-column justify-content-center align-items-center">
            <div class="col-md-2 center-block">
                <label for="inputEmail" class="sr-only">Login</label>
                <input type="text" name="adminLogin" id="inputEmail" class="form-control" placeholder="Login" required="" autofocus="">
            </div>
            <div class="col-md-2">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="adminPassword" id="inputPassword" class="form-control" placeholder="Password" required="">
            </div>
        </div>
        <button class="btn btn-lg btn-primary btn-block mt-5" type="submit">Войти</button>

    </form>
</main>
