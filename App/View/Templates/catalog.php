<main>
    <div class="album py-6 text-dark mt-5">
        <aside class="col-md-3 text-center aside" style="float: left">
            <h3>Сортировка</h3>
            <form action="/catalog" method="post">
                <label class="d-flex flex-md-row justify-content-center mt-4" for="">
                    <h5>По названию (А-Я)</h5>
                    <button class="btn btn-primary" name="sorting" value="byTitle">Показать</button>
                </label>

                <label class="d-flex flex-md-row justify-content-center mt-4" for="">
                    <h5>По названию (Я-А)</h5>
                    <button class="btn btn-primary" name="sorting" value="byTitleDesc">Показать</button>
                </label>

                <label class="d-flex flex-md-row justify-content-center mt-4" for="">
                    <h5>По стоимости ↑</h5>
                    <button class="btn btn-primary" name="sorting" value="byPrice">Показать</button>
                </label>

                <label class="d-flex flex-md-row justify-content-center mt-4" for="">
                    <h5>По стоимости ↓</h5>
                    <button class="btn btn-primary" name="sorting" value="byPriceDesc">Показать</button>
                </label>
            </form>
            <hr>
            <h3>Фильтрация</h3>
            <form action="/catalog" method="post">
                <label class="mt-4" for="">
                    <h5>Цена</h5>
                    <div class="d-flex flex-md-row justify-content-center mt-3">
                        <input class="col-md-3 bg-light border border-secondary filtration-input" value="<?php if (isset($_SESSION['priceFrom'])) echo $_SESSION['priceFrom']; ?>" name="priceFrom" type="number" placeholder="От">
                        <input class="col-md-3 bg-light border border-secondary filtration-input" value="<?php if (isset($_SESSION['priceUntil'])) echo $_SESSION['priceUntil']; ?>" name="priceUntil" type="number" placeholder="До">
                        <button class="btn btn-primary" type="submit">Показать</button>
                    </div>
                </label>
            </form>
            <form action="/clearFiltration" method="post">
                <button class="btn btn-success mt-5" type="submit">
                     Очистить
                </button>
            </form>
        </aside>
    </div>
        <div class="container1">
            <div id="container" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            </div>
            <div class="pagination">
                <ul class="list-inline list-group list-group-horizontal">
                    <?php foreach($vars['pagination'] as $item):?>
                        <form action="/catalog" method="GET">
                            <li class="list-group-item <?php if($vars['currentPage'] == $item) echo "bg-secondary";?>">
                                <button class="<?php if($vars['currentPage'] == $item) echo "bg-secondary text-white"; else echo "bg-white";?>" name="page" type="submit" value="<?php echo $item ?>"><?php echo $item ?>
                                </button>
                            </li>
                        </form>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</main>
<script src="js/catalog.js"></script>
