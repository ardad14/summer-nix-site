<main>
    <div class="container">
        <div class="basket">
            <p class="p_basket">Корзина <i class="fas fa-cart-plus"></i></p>
            <?php if (empty($vars['books'])) : ?>
                <div>
                    <h2 class="text-center">Корзина пока пуста</h2>
                </div>
            <?php else : ?>
                <?php foreach ($vars['books'] as $list) : ?>
                    <?php foreach ($list as $key => $book) : ?>
                        <?php if ($key === 'amount') {
                            continue;
                        } ?>
                    <hr>
                    <section>
                        <div class="basket__item">
                            <div class="picture">
                              <img src="image/<?php echo $book->getImage() ?>" alt="">
                            </div>

                            <div class="name">
                              <p><?php echo $book->getTitle() ?></p>
                              <div class="description">
                                  <?php echo $book->getDescription() ?>
                              </div>
                            </div>

                            <div class="price">
                              <p><?php echo $book->getPrice() ?></p>
                            </div>
                        </div>
                        <div class="btn_basket">
                            <input type="number" step="1" min="1" placeholder="<?php echo $list['amount']?>">
                            <form class="d-inline" action="basket/delete" method="POST">
                                <button name="slug" class="delete" type="submit" value="<?php echo $book->getSlug() ?>">
                                    Удалить с корзины
                                </button>
                            </form>
                          <button class="buy">Купить</button>
                        </div>
                    </section>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</main>

