<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель управления</title>
    <link rel="stylesheet" href="../../css/admin-book.css">
    <script src="https://kit.fontawesome.com/7c16640ea8.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,700;1,400;1,500&family=Roboto+Mono:ital,wght@0,300;1,300;1,400&display=swap" rel="stylesheet">
</head>
<header class="p-3 mb-3 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 link-dark">Общее</a></li>
                <li><a href="/admin/book" class="nav-link px-2 link-dark">Книги</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Пользователи</a></li>
            </ul>
            <form action="/admin/logout" method="post">
                <button type="submit" class="btn btn-light border border-dark <?php if(!isset($_SESSION['adminName'])) echo 'd-none'?>">Выход</button>
            </form>
        </div>
    </div>
</header>
<body>
<?php echo $content ?>
</body>
</html>