<main class="text-center">
    <?php if (isset($_SESSION['universalError'])) echo $_SESSION['universalError'] ?>
    <div class="position-relative overflow-hidden row p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-5">
            <img class="main-img" src="image/<?php echo $vars['books'][0]->getImage() ?>" alt="">
        </div>
        <div class="col-md-7 p-lg-5 mx-auto my-5">
            <h4 class="display-4 fw-normal"><?php echo $vars['books'][0]->getAuthor() ?></h4>
            <h6 class="display-6 fs-2 fw-normal"><?php echo $vars['books'][0]->getTitle() ?></h6>
            <p class="lead fw-normal mt-3"><?php echo $vars['books'][0]->getDescription() ?></p>
            <form action="/product" method="GET">
                <button name="slug" type="submit" class="mt-3 btn btn-outline-secondary" value="<?php echo $vars['books'][0]->getSlug()?>">
                    Подробнее
                </button>
            </form>
        </div>
    </div>
    <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
        <div class="bg-light col-md-6 me-md-3 pt-3 px-3 pt-md-5 px-md-5 my-3 py-3 text-center overflow-hidden">
            <h2 class="display-5"><?php echo $vars['books'][1]->getAuthor() ?></h2>
            <p class="lead"><?php echo $vars['books'][1]->getTitle() ?></p>
            <img class="second-block-img" src="image/<?php echo $vars['books'][1]->getImage() ?>" alt="">
            <form action="/product" method="GET">
                <button name="slug" type="submit" class="mt-3 btn btn-outline-secondary" value="<?php echo $vars['books'][1]->getSlug() ?>">
                    Подробнее
                </button>
            </form>
        </div>
        <div class="bg-light col-md-6 me-md-3 pt-3 px-3 pt-md-5 px-md-5 my-3 py-3 text-center overflow-hidden">
            <h2 class="display-5"><?php echo $vars['books'][2]->getAuthor() ?></h2>
            <p class="lead"><?php echo $vars['books'][2]->getTitle() ?></p>
            <img class="second-block-img" src="image/<?php echo $vars['books'][2]->getImage() ?>" alt="">
            <form action="/product" method="GET">
                <button name="slug" type="submit" class="mt-3 btn btn-outline-secondary" value="<?php echo $vars['books'][2]->getSlug() ?>">
                    Подробнее
                </button>
            </form>
        </div>
    </div>
</main>