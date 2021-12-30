<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetPageProperty("description", "Мои отзывы");
$APPLICATION->SetTitle("Мои отзывы");
$APPLICATION->SetPageProperty('title', 'Мои отзывы');

if (!$USER->IsAuthorized())
{
	$_SESSION["BACKURL"] = $APPLICATION->GetCurPage();
	LocalRedirect("/auth/");
}
?>

    
    <div class="cabinet cabinet-reviews cabinet-section">
        <div class="cabinet-section-title">
            Мои
            отзывы
        </div>
        <div class="cabinet-reviews-wrapp">
            <div class="product-review">

                <div class="product-review-name">
                    Подушка
                    Qmed
                </div>


                <div class="product-review-info">
                    <div class="rating">
                        <div class="rating-state"
                             style="width:70%;"></div>
                    </div>
                    <div class="product-review-date">
                        13
                        марта
                        2021
                        г.
                    </div>
                </div>
                <div class="product-review-text">
                    <p>
                        Очень
                        удобная
                        подушка,
                        со
                        временем
                        перестала
                        болеть
                        шея,
                        сплю
                        всю
                        ночь
                        как
                        младенец,
                        очень
                        удобная
                        подушка,
                        со
                        временем
                        перестала
                        болеть
                        шея,
                        сплю
                        всю
                        ночь
                        как
                        младенец.
                </div>


            </div>
            <div class="product-review">

                <div class="product-review-name">
                    Подушка
                    Qmed
                </div>


                <div class="product-review-info">
                    <div class="rating">
                        <div class="rating-state"
                             style="width:70%;"></div>
                    </div>
                    <div class="product-review-date">
                        13
                        марта
                        2021
                        г.
                    </div>
                </div>
                <div class="product-review-text">
                    <p>
                        Очень
                        удобная
                        подушка,
                        со
                        временем
                        перестала
                        болеть
                        шея,
                        сплю
                        всю
                        ночь
                        как
                        младенец,
                        очень
                        удобная
                        подушка,
                        со
                        временем
                        перестала
                        болеть
                        шея,
                        сплю
                        всю
                        ночь
                        как
                        младенец.
                </div>


                <div class="product-review-imgs">
                    <button class="slider-arrow slider-arrow-prev"
                            aria-label="Назад">
                        <svg width="30"
                             height="30">
                            <use xlink:href="#icon-arrow-down"/>
                        </svg>
                    </button>
                    <button class="slider-arrow slider-arrow-next"
                            aria-label="Вперед">
                        <svg width="30"
                             height="30">
                            <use xlink:href="#icon-arrow-down"/>
                        </svg>
                    </button>
                    <div class="product-review-imgs-slider swiper-container">
                        <div class="swiper-wrapper">


                            <div class="product-review-imgs-slide swiper-slide">
                                <a href="img/product-img-full.jpg"
                                   data-fancybox="product-review-2">
                                    <img src="img/product-img-small.jpg"
                                         srcset="img/product-img-small@2x.jpg 2x"
                                         alt="">
                                </a>
                            </div>

                            <div class="product-review-imgs-slide swiper-slide">
                                <a href="img/product-img-full.jpg"
                                   data-fancybox="product-review-2">
                                    <img src="img/product-img-small.jpg"
                                         srcset="img/product-img-small@2x.jpg 2x"
                                         alt="">
                                </a>
                            </div>

                            <div class="product-review-imgs-slide swiper-slide">
                                <a href="img/product-img-full.jpg"
                                   data-fancybox="product-review-2">
                                    <img src="img/product-img-small.jpg"
                                         srcset="img/product-img-small@2x.jpg 2x"
                                         alt="">
                                </a>
                            </div>

                            <div class="product-review-imgs-slide swiper-slide">
                                <a href="img/product-img-full.jpg"
                                   data-fancybox="product-review-2">
                                    <img src="img/product-img-small.jpg"
                                         srcset="img/product-img-small@2x.jpg 2x"
                                         alt="">
                                </a>
                            </div>

                            <div class="product-review-imgs-slide swiper-slide">
                                <a href="img/product-img-full.jpg"
                                   data-fancybox="product-review-2">
                                    <img src="img/product-img-small.jpg"
                                         srcset="img/product-img-small@2x.jpg 2x"
                                         alt="">
                                </a>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
            <div class="product-review">

                <div class="product-review-name">
                    Подушка
                    Qmed
                </div>


                <div class="product-review-info">
                    <div class="rating">
                        <div class="rating-state"
                             style="width:70%;"></div>
                    </div>
                    <div class="product-review-date">
                        13
                        марта
                        2021
                        г.
                    </div>
                </div>
                <div class="product-review-text">
                    <p>
                        Очень
                        удобная
                        подушка,
                        со
                        временем
                        перестала
                        болеть
                        шея,
                        сплю
                        всю
                        ночь
                        как
                        младенец,
                        очень
                        удобная
                        подушка,
                        со
                        временем
                        перестала
                        болеть
                        шея,
                        сплю
                        всю
                        ночь
                        как
                        младенец.
                </div>

                <div class="product-review-answer">
                    <div class="product-review-answer-head">
                        <div class="product-review-name">
                            Гипермед
                        </div>
                        <div class="product-review-date">
                            13
                            марта
                            2021
                            г.
                        </div>
                    </div>
                    <div class="product-review-text">
                        <p>
                            Здравствуйте
                            Кирилл,
                            мы
                            рады,
                            что
                            вам
                            очень
                            понравилась,
                            данная
                            подушка.
                            Спасибо
                            за
                            комментарий!
                    </div>
                </div>


                <div class="product-review-imgs">
                    <button class="slider-arrow slider-arrow-prev"
                            aria-label="Назад">
                        <svg width="30"
                             height="30">
                            <use xlink:href="#icon-arrow-down"/>
                        </svg>
                    </button>
                    <button class="slider-arrow slider-arrow-next"
                            aria-label="Вперед">
                        <svg width="30"
                             height="30">
                            <use xlink:href="#icon-arrow-down"/>
                        </svg>
                    </button>
                    <div class="product-review-imgs-slider swiper-container">
                        <div class="swiper-wrapper">


                            <div class="product-review-imgs-slide swiper-slide">
                                <a href="img/product-img-full.jpg"
                                   data-fancybox="product-review-3">
                                    <img src="img/product-img-small.jpg"
                                         srcset="img/product-img-small@2x.jpg 2x"
                                         alt="">
                                </a>
                            </div>

                            <div class="product-review-imgs-slide swiper-slide">
                                <a href="img/product-img-full.jpg"
                                   data-fancybox="product-review-3">
                                    <img src="img/product-img-small.jpg"
                                         srcset="img/product-img-small@2x.jpg 2x"
                                         alt="">
                                </a>
                            </div>

                            <div class="product-review-imgs-slide swiper-slide">
                                <a href="img/product-img-full.jpg"
                                   data-fancybox="product-review-3">
                                    <img src="img/product-img-small.jpg"
                                         srcset="img/product-img-small@2x.jpg 2x"
                                         alt="">
                                </a>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
            <div class="product-review">

                <div class="product-review-name">
                    Подушка
                    Qmed
                </div>


                <div class="product-review-info">
                    <div class="rating">
                        <div class="rating-state"
                             style="width:70%;"></div>
                    </div>
                    <div class="product-review-date">
                        13
                        марта
                        2021
                        г.
                    </div>
                </div>
                <div class="product-review-text">
                    <p>
                        Очень
                        удобная
                        подушка,
                        со
                        временем
                        перестала
                        болеть
                        шея,
                        сплю
                        всю
                        ночь
                        как
                        младенец,
                        очень
                        удобная
                        подушка,
                        со
                        временем
                        перестала
                        болеть
                        шея,
                        сплю
                        всю
                        ночь
                        как
                        младенец.
                </div>


                <div class="product-review-imgs">
                    <button class="slider-arrow slider-arrow-prev"
                            aria-label="Назад">
                        <svg width="30"
                             height="30">
                            <use xlink:href="#icon-arrow-down"/>
                        </svg>
                    </button>
                    <button class="slider-arrow slider-arrow-next"
                            aria-label="Вперед">
                        <svg width="30"
                             height="30">
                            <use xlink:href="#icon-arrow-down"/>
                        </svg>
                    </button>
                    <div class="product-review-imgs-slider swiper-container">
                        <div class="swiper-wrapper">


                            <div class="product-review-imgs-slide swiper-slide">
                                <a href="img/product-img-full.jpg"
                                   data-fancybox="product-review-4">
                                    <img src="img/product-img-small.jpg"
                                         srcset="img/product-img-small@2x.jpg 2x"
                                         alt="">
                                </a>
                            </div>

                            <div class="product-review-imgs-slide swiper-slide">
                                <a href="img/product-img-full.jpg"
                                   data-fancybox="product-review-4">
                                    <img src="img/product-img-small.jpg"
                                         srcset="img/product-img-small@2x.jpg 2x"
                                         alt="">
                                </a>
                            </div>

                            <div class="product-review-imgs-slide swiper-slide">
                                <a href="img/product-img-full.jpg"
                                   data-fancybox="product-review-4">
                                    <img src="img/product-img-small.jpg"
                                         srcset="img/product-img-small@2x.jpg 2x"
                                         alt="">
                                </a>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
            <div class="product-review">

                <div class="product-review-name">
                    Подушка
                    Qmed
                </div>


                <div class="product-review-info">
                    <div class="rating">
                        <div class="rating-state"
                             style="width:70%;"></div>
                    </div>
                    <div class="product-review-date">
                        13
                        марта
                        2021
                        г.
                    </div>
                </div>
                <div class="product-review-text">
                    <p>
                        Очень
                        удобная
                        подушка,
                        со
                        временем
                        перестала
                        болеть
                        шея,
                        сплю
                        всю
                        ночь
                        как
                        младенец,
                        очень
                        удобная
                        подушка,
                        со
                        временем
                        перестала
                        болеть
                        шея,
                        сплю
                        всю
                        ночь
                        как
                        младенец.
                </div>


            </div>
            <div class="product-review">

                <div class="product-review-name">
                    Подушка
                    Qmed
                </div>


                <div class="product-review-info">
                    <div class="rating">
                        <div class="rating-state"
                             style="width:70%;"></div>
                    </div>
                    <div class="product-review-date">
                        13
                        марта
                        2021
                        г.
                    </div>
                </div>
                <div class="product-review-text">
                    <p>
                        Очень
                        удобная
                        подушка,
                        со
                        временем
                        перестала
                        болеть
                        шея,
                        сплю
                        всю
                        ночь
                        как
                        младенец,
                        очень
                        удобная
                        подушка,
                        со
                        временем
                        перестала
                        болеть
                        шея,
                        сплю
                        всю
                        ночь
                        как
                        младенец.
                </div>


            </div>
            <div class="product-review">

                <div class="product-review-name">
                    Подушка
                    Qmed
                </div>


                <div class="product-review-info">
                    <div class="rating">
                        <div class="rating-state"
                             style="width:70%;"></div>
                    </div>
                    <div class="product-review-date">
                        13
                        марта
                        2021
                        г.
                    </div>
                </div>
                <div class="product-review-text">
                    <p>
                        Очень
                        удобная
                        подушка,
                        со
                        временем
                        перестала
                        болеть
                        шея,
                        сплю
                        всю
                        ночь
                        как
                        младенец,
                        очень
                        удобная
                        подушка,
                        со
                        временем
                        перестала
                        болеть
                        шея,
                        сплю
                        всю
                        ночь
                        как
                        младенец.
                </div>


                <div class="product-review-imgs">
                    <button class="slider-arrow slider-arrow-prev"
                            aria-label="Назад">
                        <svg width="30"
                             height="30">
                            <use xlink:href="#icon-arrow-down"/>
                        </svg>
                    </button>
                    <button class="slider-arrow slider-arrow-next"
                            aria-label="Вперед">
                        <svg width="30"
                             height="30">
                            <use xlink:href="#icon-arrow-down"/>
                        </svg>
                    </button>
                    <div class="product-review-imgs-slider swiper-container">
                        <div class="swiper-wrapper">


                            <div class="product-review-imgs-slide swiper-slide">
                                <a href="img/product-img-full.jpg"
                                   data-fancybox="product-review-7">
                                    <img src="img/product-img-small.jpg"
                                         srcset="img/product-img-small@2x.jpg 2x"
                                         alt="">
                                </a>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
            <div class="product-review">

                <div class="product-review-name">
                    Подушка
                    Qmed
                </div>


                <div class="product-review-info">
                    <div class="rating">
                        <div class="rating-state"
                             style="width:70%;"></div>
                    </div>
                    <div class="product-review-date">
                        13
                        марта
                        2021
                        г.
                    </div>
                </div>
                <div class="product-review-text">
                    <p>
                        Очень
                        удобная
                        подушка,
                        со
                        временем
                        перестала
                        болеть
                        шея,
                        сплю
                        всю
                        ночь
                        как
                        младенец,
                        очень
                        удобная
                        подушка,
                        со
                        временем
                        перестала
                        болеть
                        шея,
                        сплю
                        всю
                        ночь
                        как
                        младенец.
                </div>


            </div>
            <div class="product-review">

                <div class="product-review-name">
                    Подушка
                    Qmed
                </div>


                <div class="product-review-info">
                    <div class="rating">
                        <div class="rating-state"
                             style="width:70%;"></div>
                    </div>
                    <div class="product-review-date">
                        13
                        марта
                        2021
                        г.
                    </div>
                </div>
                <div class="product-review-text">
                    <p>
                        Очень
                        удобная
                        подушка,
                        со
                        временем
                        перестала
                        болеть
                        шея,
                        сплю
                        всю
                        ночь
                        как
                        младенец,
                        очень
                        удобная
                        подушка,
                        со
                        временем
                        перестала
                        болеть
                        шея,
                        сплю
                        всю
                        ночь
                        как
                        младенец.
                </div>


                <div class="product-review-imgs">
                    <button class="slider-arrow slider-arrow-prev"
                            aria-label="Назад">
                        <svg width="30"
                             height="30">
                            <use xlink:href="#icon-arrow-down"/>
                        </svg>
                    </button>
                    <button class="slider-arrow slider-arrow-next"
                            aria-label="Вперед">
                        <svg width="30"
                             height="30">
                            <use xlink:href="#icon-arrow-down"/>
                        </svg>
                    </button>
                    <div class="product-review-imgs-slider swiper-container">
                        <div class="swiper-wrapper">


                            <div class="product-review-imgs-slide swiper-slide">
                                <a href="img/product-img-full.jpg"
                                   data-fancybox="product-review-9">
                                    <img src="img/product-img-small.jpg"
                                         srcset="img/product-img-small@2x.jpg 2x"
                                         alt="">
                                </a>
                            </div>

                            <div class="product-review-imgs-slide swiper-slide">
                                <a href="img/product-img-full.jpg"
                                   data-fancybox="product-review-9">
                                    <img src="img/product-img-small.jpg"
                                         srcset="img/product-img-small@2x.jpg 2x"
                                         alt="">
                                </a>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>