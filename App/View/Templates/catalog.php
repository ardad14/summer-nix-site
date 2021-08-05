<main>
    <div class="album py-6 text-dark mt-5">
        <div class="container1">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach($vars['books'] as $book): ?>
                <form action="/product" method="GET">
                    <div class="col mb-5">
                        <div class="products__item">
                            <img class="photo" src="image/<?php echo $book->getImage() ?>" alt="">
                            <h2><?php echo $book->getAuthor() ?></h2>
                            <h1><?php echo $book->getName() ?></h1>
<!--                            <h3></h3>-->
                            <button name="slug" type="submit" class="btn btn-dark text-center" value="<?php echo $book->getSlug() ?>">
                                Купить за <?php echo $book->getPrice() . " грн" ?>
                            </button>
                        </div>

                    </div>
                </form>
                <?php endforeach; ?>
            </div>
            <div class="pagination">
                <ul class="list-inline list-group list-group-horizontal">
                    <?php foreach($vars['pagination'] as $item):?>
                        <form action="/catalog" method="GET">
                            <li class="list-group-item <?php if($vars['currentPage'] == $item) echo "bg-secondary";?>"><button class="<?php if($vars['currentPage'] == $item) echo "bg-secondary text-white"; else echo "bg-white";?>" name="page" type="submit" value="<?php echo $item ?>"><?php echo $item ?></button></li>
                        </form>`
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</main>