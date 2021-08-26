<main class="text-center">
    <h1>Создание</h1>
    <form action="/admin/book/add" method="post" class="mt-4" enctype="multipart/form-data">
        <div class="d-flex flex-md-row">
            <label for="title" class="col">
                <h5>Название</h5>
                <input name="title">
            </label>
        </div>
        <div class="d-flex flex-md-row">
            <label for="description" class="col mt-4">
                <h5>Описание</h5>
                <input name="description">
            </label>
        </div>
        <div class="d-flex flex-md-row">
            <label for="author" class="col mt-4">
                <h5>Автор</h5>
                <input name="author">
            </label>
        </div>
        <div class="d-flex flex-md-row">
            <label for="price" class="col mt-4">
                <h5>Цена</h5>
                <input name="price">
            </label>
        </div>
        <div class="d-flex flex-md-row">
            <label for="amount" class="col mt-4">
                <h5>Количество</h5>
                <input name="amount">
            </label>
        </div>
        <div class="d-flex flex-md-row">
            <label for="slug" class="col mt-4">
                <h5>Слаг</h5>
                <input name="slug">
            </label>
        </div>
        <div class="d-flex flex-md-row">
            <label for="genre" class="col mt-4">
                <h5>Жанр</h5>
                <input name="genre">
            </label>
        </div>
        <div class="d-flex flex-md-row">
            <label for="image" class="col mt-4">
                <h5>Картинка</h5>
                <input name="image" type="file" >
            </label>
        </div>
        <button type="submit" class="btn btn-primary mt-3" name="id">
            Create
        </button>
    </form>
</main>
