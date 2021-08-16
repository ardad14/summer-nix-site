<main class="text-center">
    <?php if (isset($_SESSION['universalError'])) echo $_SESSION['universalError'] ?>
    <div class="position-relative overflow-hidden row p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-5">
            <img class="main-img" src="image/monday.jpg" alt="">
        </div>
        <div class="col-md-7 p-lg-5 mx-auto my-5">
            <h6 class="display-6 fw-normal">Понедельник начинается в субботу</h6>
            <p class="lead fw-normal mt-3">Программист Александр Привалов отправляется в путешествие. В пути, неподалеку от Соловца, он встречает двух сотрудников местного вуза со странным названием НИИЧАВО. А затем соглашается переночевать в институтском музее Изнакурнож на улице Лукоморье и практически попадает в сказочную реальность…</p>
            <form action="/product" method="GET">
                <button name="slug" type="submit" class="mt-3 btn btn-outline-secondary" value="monday-starts-saturday">
                    Подробнее
                </button>
            </form>
        </div>
    </div>
    <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
        <div class="bg-light col-md-6 me-md-3 pt-3 px-3 pt-md-5 px-md-5 my-3 py-3 text-center overflow-hidden">
            <h2 class="display-5">Айн Рэнд</h2>
            <p class="lead">Атлант расправил плечи</p>
            <img class="second-block-img" src="image/ayn-rend-atlant-raspravil-plechi.png" alt="">
            <form action="/product" method="GET">
                <button name="slug" type="submit" class="mt-3 btn btn-outline-secondary" value="atlas-shrugged">
                    Подробнее
                </button>
            </form>
        </div>
        <div class="bg-light col-md-6 me-md-3 pt-3 px-3 pt-md-5 px-md-5 my-3 p-3 text-center overflow-hidden">
            <h2 class="display-5">Эрнест Хэмингуэй</h2>
            <p class="lead">Старик и море</p>
            <img class="second-block-img" src="image/Ernest_Heminguej__Starik_i_more.png" alt="">
            <form action="/product" method="GET">
                <button name="slug" type="submit" class="mt-3 btn btn-outline-secondary" value="the-old-man-and-the-sea">
                    Подробнее
                </button>
            </form>
        </div>
    </div>
</main>