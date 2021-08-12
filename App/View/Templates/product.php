<main>
    <div class="content-container">
        <p class="product-path"><?php echo "Книги / " . $vars["book"][0]->getGenre() . " / " . $vars["book"][0]->getAuthor() . " / " . $vars["book"][0]->getTitle()?>
        <div class="row mt-5">
            <div class="col-md-5">
                <img class="product-img" <?php echo "src=image/" . $vars["book"][0]->getImage() ?> alt="">
            </div>
            <div class="col-md-7 product-text">
                <h6 class="display-6 fw-normal"><?php echo $vars["book"][0]->getTitle()?></h6>
                <p class="lead fw-normal mt-3">Автор: <?php echo $vars["book"][0]->getAuthor()?></p>
                <div class="row mt-5">
                    <div class="col-md-3">
                        <a class="btn btn-light border border-dark" href="#">Читать фрагмент</a>
                    </div>
                    <div class="col-md-3">
                        <a class="btn btn-light border border-dark" href="#">В избранное</a>
                    </div>
                </div>
                <div class="col-md-3 mt-5">
                    <form action="/basket/add" method="POST">
                        <button name="slug" class="btn btn-success" type="submit" value="<?php echo $vars["book"][0]->getSlug() ?>">
                            Купить и скачать за <?php echo $vars["book"][0]->getPrice()?>₴
                        </button>
                    </form>
                </div>
                <div class="row mt-4">
                    <div class="col-md-2">
                        <a class="rate-text" href="#">4.5</a>
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 30 29" height="29px" width="30px">
                            <g fill-rule="evenodd" fill="none" stroke-width="1" stroke="none">
                                <g fill="#FF4C00" stroke="#FF4C00" stroke-width="2" fill-rule="nonzero" transform="translate(-441.000000, -51.000000)">
                                    <g transform="translate(441.000000, 51.000000)">
                                        <path d="M6.63927656,27.2087237 L15,22.1735129 L23.3607234,27.2087237 C23.5552531,27.3258783 23.787812,27.1596746 23.740838,26.9655059 L21.4620737,17.5461352 L28.9168739,11.2496986 C29.0740235,11.1169676 28.9915659,10.8673347 28.7695949,10.8497885 L18.9999096,10.0775215 L15.2328714,1.14726272 C15.1500453,0.950912427 14.8499547,0.950912427 14.7671286,1.14726272 L11.0000904,10.0775215 L1.23040508,10.8497885 C1.00843411,10.8673347 0.925976492,11.1169676 1.08312613,11.2496986 L8.53792635,17.5461352 L6.25916195,26.9655059 C6.21218804,27.1596746 6.44474689,27.3258783 6.63927656,27.2087237 Z"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="col-md-2 livelib-rate">
                        <a class="rate-text" href="#">4.3</a>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 34 24" height="24" width="34">
                            <path fill="url(#paint0_linear)" d="M18.5928 23.5666C21.8014 21.6491 26.0334 19.1094 27.5336 18.2184C29.0338 17.3274 30 16.593 30 14.9529C30 13.3129 29.9903 3.19137 29.9903 1.77455C29.9903 0.357725 28.6991 -0.564133 27.0742 0.391706C25.6601 1.22349 17.0006 6.41654 17.0006 6.41654C17.0006 6.41654 8.51852 1.32914 6.92751 0.391706C5.3365 -0.545733 4.01119 0.330413 4.01119 1.78616C4.01119 3.24191 4.00551 13.9215 4 14.9501C4 16.6151 5.02087 17.3358 6.46614 18.2184C7.91141 19.101 12.1582 21.6577 15.4129 23.5666C15.6656 23.7148 16.202 24 17.0018 24C17.8016 24 18.3678 23.701 18.5928 23.5666Z" clip-rule="evenodd" fill-rule="evenodd"></path>
                            <defs>
                                <linearGradient gradientUnits="userSpaceOnUse" y2="9.75099" x2="4" y1="9.74932" x1="30" id="paint0_linear">
                                    <stop stop-color="#3E99ED"></stop>
                                    <stop stop-color="#59C7FF" offset="1"></stop>
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="about">
            <div class="info col-md-10 mt-5">
                <h6 class="display-6 fw-normal text-center">Описание</h6>
                <p class="lead fw-normal mt-3"><?php echo $vars["book"][0]->getDescription()?></p>
            </div>
    </div>
</main>