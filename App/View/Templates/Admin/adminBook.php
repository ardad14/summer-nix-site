<main class="text-center">
    <h2>Книги</h2>
    <form action="/admin/book/addForm">
        <button class="btn btn-primary">Добавить книгу</button>
    </form>
    <div class="album py-6 text-dark mt-5">
        <div class="container1">
            <div id="container" class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-3">
                <?php foreach($vars['books'] as $book): ?>
                        <div>
                            <div class="col-md-10 products-item border border-dark">
                                <div class="d-flex flex-md-row">
                                    <img class="photo" src="../../image/<?php echo $book->getImage() ?>" alt="">
                                    <div class="d-flex w-75 justify-content-between">
                                        <div class="d-flex flex-md-column">
                                            <h4><?php echo $book->getAuthor() ?></h4>
                                            <h4><?php echo $book->getTitle() ?></h4>
                                        </div>
                                        <div class="d-flex flex-md-column">
                                            <h4><?php echo $book->getPrice() . "грн" ?></h4>
                                            <h4><?php echo $book->getAmount() . "шт" ?></h4>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-md-column">
                                        <form action="/admin/book/update" method="GET">
                                            <button class="btn btn-success" type="submit" name="id" value="<?php echo $book->getId() ?>">
                                                Обновить
                                            </button>
                                        </form>
                                    </div>
                                    <div class="d-flex flex-md-column">
                                        <form action="/admin/book/delete" method="POST">
                                            <button class="btn btn-danger" type="submit" name="id" value="<?php echo $book->getId() ?>">
                                                Удалить
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>
