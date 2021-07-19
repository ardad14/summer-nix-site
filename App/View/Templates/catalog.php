<main>

    <div class="album py-6 text-dark">
        <div class="container1">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach($vars['books'] as $book): ?>
                <form action="/product" method="GET">
                    <div class="col">
                        <div class="products__item">
                            <img class="photo" src="image/<?php echo $book->getImage() ?>" alt="">
                            <h2><?php echo $book->getAuthor() ?></h2>
                            <h1><?php echo $book->getName() ?></h1>
                            <h3><?php echo $book->getPrice() . "грн" ?></h3>
                        </div>
                        <button name="slug" type="submit" class="btn btn-dark text-center ml-4" value="<?php echo $book->getSlug() ?>">
                            Купить
                        </button>
                    </div>
                </form>
                <?php endforeach; ?>
            </div>
            <button class="button">Покажите еще   <i class="fas fa-angle-double-right"></i></button>
        </div>
    </div>




<!--    <div class="container1">-->
<!--            <h1>Каталог <i class="fas fa-book"></i></h1>-->
<!--            <h2>Классическая литература</h2>-->
<!--            --><?php //$iterator = 0; ?>
<!--            --><?php //foreach($vars['books'] as $book): ?>
<!--                --><?php //if($iterator % 5 === 0 || $iterator === 0): ?>
<!--                    <hr class="hr">-->
<!--                    <div class="products">-->
<!--                --><?php //endif; ?>
<!--                <div class="products__item">-->
<!--                    <img class="photo" src="image/--><?php //echo $book->getImage() ?><!--" alt="">-->
<!--                    <h2>--><?php //echo $book->getAuthor() ?><!--</h2>-->
<!--                    <h1>--><?php //echo $book->getName() ?><!--</h1>-->
<!--                    <h3>--><?php //echo $book->getPrice() . "грн" ?><!--</h3>-->
<!--                    <a href="--><?php //echo $book->getSlug() ?><!--">Купить</a>-->
<!--                </div>-->
<!--                --><?php //if($iterator % 5 === 0 || $iterator === 0): ?>
<!--                    </div>-->
<!--                --><?php //endif; ?>
<!--                --><?php //$iterator++; ?>
<!--            --><?php //endforeach; ?>
<!--            <button class="button">Покажите еще   <i class="fas fa-angle-double-right"></i></button>-->
<!--        </div>-->
</main>