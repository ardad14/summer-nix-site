<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title?></title>
    <link rel="stylesheet" href="css/main-page.css">
    <link rel="stylesheet" href="css/product-page.css">
    <link rel="stylesheet" href="css/catalog.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/basket.css">
    <script src="https://kit.fontawesome.com/7c16640ea8.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,700;1,400;1,500&family=Roboto+Mono:ital,wght@0,300;1,300;1,400&display=swap" rel="stylesheet">
</head>
<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fourth navbar example">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Booker</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExample04">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Главная</a>
                    </li>
                    <form action="/catalog" method="GET">
                        <li class="nav-item">
                            <a class="nav-link active" href="#"><button name="page" type="submit" class="bg-dark text-white" value="1">Каталог</button></a>
                        </li>
                    </form>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Популярное</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">Жанры</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown04">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#" tabindex="-1">О нас</a>
                    </li>
                </ul>
                <?php if(isset($_SESSION['userName'])): ?>
                    <p class="col-md-2 text-white" href="/profile">
                        <?php echo $_SESSION['userName'] ?>
                    </p>
                    <a class="col-md-2" href="/logout">
                        <button class="btn btn-outline-light my-2 my-sm-0">
                            Logout
                        </button>
                    </a>
                <?php else: ?>
                <a class="col-md-1" href="/login">
                    <button class="btn btn-outline-light my-2 my-sm-0">
                        Войти
                    </button>
                </a>
                <a class="col-md-2 nav-link active text-white" href="/registration">
                    Регистрация
                </a>
                <?php endif; ?>
                <form>
                    <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                </form>
            </div>
        </div>
    </nav>
</header>
<body>
    <?php echo $content ?>
</body>
<footer class="footer">
    <div class="footer__info">
        <div class="footer_links">
            <div class="social">
                <div class="social_text">
                    <h4>Мы в соц.сетях:</h4>
                </div>
                <div class="social_links">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-telegram"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                </div>
            </div>
        </div>
        <div class="footer_text">
            Booker
        </div>
    </div>
</footer>
</html>
