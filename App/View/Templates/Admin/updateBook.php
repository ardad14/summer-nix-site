<main class="text-center">
    <h1>Обновить</h1>
        <form action="/admin/book/change" method="post" class="mt-5 justify-content-center">
            <div class="d-flex flex-md-row">
                <label for="title" class="col">
                    <h5>Название</h5>
                    <input value="<?php echo $vars['book'][0]->getTitle() ?>" name="title">
                </label>
            </div>
            <div class="d-flex flex-md-row">
                <label for="description" class="col mt-4">
                    <h5>Описание</h5>
                    <input value="<?php echo $vars['book'][0]->getDescription()?>" name="description">
                </label>
            </div>
            <div class="d-flex flex-md-row">
                <label for="author" class="col mt-4">
                    <h5>Автор</h5>
                    <input value="<?php echo $vars['book'][0]->getAuthor() ?>" name="author">
                </label>
            </div>
            <div class="d-flex flex-md-row">
                <label for="price" class="col mt-4">
                    <h5>Цена</h5>
                    <input value="<?php echo $vars['book'][0]->getPrice()?>" name="price">
                </label>
            </div>
            <div class="d-flex flex-md-row">
                <label for="amount" class="col mt-4">
                    <h5>Количество</h5>
                    <input value="<?php echo $vars['book'][0]->getAmount() ?>" name="amount">
                </label>
            </div>
            <div class="d-flex flex-md-row">
                <label for="slug" class="col mt-4">
                    <h5>Слаг</h5>
                    <input value="<?php echo $vars['book'][0]->getSlug() ?>" name="slug">
                </label>
            </div>
            <div class="d-flex flex-md-row">
                <label for="genre" class="col mt-4">
                    <h5>Жанр</h5>
                    <input value="<?php echo $vars['book'][0]->getGenre() ?>" name="genre">
                </label>
            </div>
            <div class="d-flex flex-md-row">
                <label for="image" class="col mt-4">
                    <h5>Картинка</h5>
                    <img src="../../image/<?php echo $vars['book'][0]->getImage() ?>" alt="No image" class="photo">
                    <input name="image" value="<?php echo $vars['book'][0]->getImage() ?>" type="file" >
                </label>
            </div>
            <button type="submit" class="btn btn-primary mb-5" value="<?php echo $vars['book'][0]->getId() ?>" name="id">
                Update
            </button>
        </form>
    </div>
</main>
