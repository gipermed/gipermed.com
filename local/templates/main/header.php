<?php check_prolog();

use Bitrix\Main\Context;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Web\Cookie;
use Palladiumlab\Management\User;
use Palladiumlab\Support\Bitrix\Sale\BasketManager;
global $APPLICATION;

$context = Context::getCurrent();
$request = $context->getRequest();

Loc::loadMessages(__FILE__);

$basketManager = BasketManager::createFromCurrent();

if ($request->get('basket-clear') === 'y') {
    $basketManager->clear();
    LocalRedirect($APPLICATION->GetCurPage());
}

if ($request->get('cookie-submit') === 'y') {
    $context
        ->getResponse()
        ->addCookie(new Cookie(
            'cookie-submit',
            'Y',
            time() + 60 * 60 * 24 * 30 * 12 * 5
        ))
        ->writeHeaders();
    LocalRedirect($APPLICATION->GetCurPage());
}

$basketManager->clearUnavailable();

$user = User::current();

?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>">
<head>
    <title><?php $APPLICATION->ShowTitle() ?></title>

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="icon" type="image/x-icon" href="/favicon.ico"/>
    <?php
    $GLOBALS["PAGE"] = explode("/", $APPLICATION->GetCurPage());
    $asset = asset();

    $arCss = [
        SITE_TEMPLATE_PATH . 'assets/css/vendor/swiper-bundle.min.css',
        SITE_TEMPLATE_PATH . 'assets/css/vendor/jquery.fancybox.min.css',
        SITE_TEMPLATE_PATH . 'assets/css/vendor/jquery.ui.slider.css',
        SITE_TEMPLATE_PATH . 'assets/css/vendor/jquery-ui.min.css',

        SITE_TEMPLATE_PATH . 'assets/css/styles.css',
		//SITE_TEMPLATE_PATH . '/assets/css/jquery.fias.min.css',
    ];

    foreach ($arCss as $css) {
        $asset->addCss($css);
    }

    $arJs = [
        SITE_TEMPLATE_PATH . 'assets/js/vendor/jquery-3.6.0.min.js',
        SITE_TEMPLATE_PATH . 'assets/js/vendor/swiper-bundle.min.js',
        SITE_TEMPLATE_PATH . 'assets/js/vendor/jquery.fancybox.min.js',
        SITE_TEMPLATE_PATH . 'assets/js/vendor/jquery.ui.slider.js',
        SITE_TEMPLATE_PATH . 'assets/js/vendor/jquery.form.min.js',
        SITE_TEMPLATE_PATH . 'assets/js/vendor/jquery-ui.min.js',
        SITE_TEMPLATE_PATH . 'assets/js/inputmask-robin.min.js',
		//SITE_TEMPLATE_PATH . 'assets/js/jquery.fias.min.js',
		'/local/components/prymery/feedback.form/js/inputmask-robin.min.js',
		'/local/components/prymery/feedback.form/js/jquery.form.min.js',
		'/local/components/prymery/feedback.form/js/prForm.js',

        SITE_TEMPLATE_PATH . 'assets/js/scripts.js',
		SITE_TEMPLATE_PATH . 'assets/js/scriptfunc.js',
        SITE_TEMPLATE_PATH . 'assets/build/app.js',
    ];
	\Bitrix\Main\UI\Extension::load("ui.bootstrap4");
    foreach ($arJs as $js) {
        $asset->addJs($js);
    }
    $APPLICATION->AddHeadString('<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;700;800&display=swap" rel="stylesheet">');
    $APPLICATION->ShowHead();
    ?>
    <script src="//api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script>
    <link href="/local/templates/main/assets/select/select2.min.css" type="text/css" rel="stylesheet"/>
    <script type="text/javascript" src="/local/templates/main/assets/select/select2.full.min.js"></script>
    <script data-skip-moving="true" src="https://api-maps.yandex.ru/2.1.79/?apikey=c617d6aa-9ec6-4567-8bb9-7b600859bc60&lang=ru_RU" type="text/javascript"></script>

</head>
<body class="page-<?php $APPLICATION->ShowProperty('body-class'); ?>">

<?php
function getGroupsByLocation($locationId)
{
    $res = \Bitrix\Sale\Location\LocationTable::getList([
        'filter' => ['=ID' => $locationId,'NAME.LANGUAGE_ID' => LANGUAGE_ID],
        'select' => ['ID', 'CODE','LEFT_MARGIN', 'RIGHT_MARGIN','LOCATION_NAME' => 'NAME.NAME']
    ]);

    if(!$loc = $res->fetch())
    { return [];}

    $arLocs = CSaleLocation::GetLocationZIP($locationId);
    $arLocs = $arLocs->Fetch();

    $locations[0] = $loc['CODE'];
    $locations[1] = $arLocs['ZIP'];
    $locations[2] = $loc['LOCATION_NAME'];

    $res = \Bitrix\Sale\Location\LocationTable::getList([
        'filter' => [
            '<LEFT_MARGIN' => $loc['LEFT_MARGIN'],
            '>RIGHT_MARGIN' => $loc['RIGHT_MARGIN'],
            'NAME.LANGUAGE_ID' => LANGUAGE_ID],
        'select' => ['LOCATION_NAME' => 'NAME.NAME'],
    ]);

    while($locParent = $res->fetch())
    {
        $locations[] = $locParent['LOCATION_NAME'];
    }
    $locations = array_diff($locations, ["Россия"]);
    //  $locations = implode(",", $locations);
    return $locations;
}
?>


<?php $APPLICATION->IncludeComponent("bitrix:main.include", "", array(
    "AREA_FILE_SHOW" => "file",
    "PATH" => "/include/sprite.php"
), false, ['HIDE_ICONS' => 'Y']) ?>

<?php if (!$request->getCookie('cookie-submit')) { ?>
    <div class="cookie">
        <div class="container">
            <div class="cookie-info">
                <p>Наш сайт использует cookie для того, чтобы обеспечить максимальное удобство пользователям.</p>
                <p>Продолжая просматривать наш сайт, вы соглашаетесь с использованием cookie.</p>
            </div>
            <ul class="cookie-links">
                <li>
                    <a href="?cookie-submit=y" class="btn submit btn-green cookie-submit">
                        Согласиться
                    </a>
                </li>
                <li><a href="#">Подробнее</a></li>
            </ul>
        </div>
    </div>
<?php } ?>

<div id="panel"><?php $APPLICATION->ShowPanel() ?></div>

<header class="header">
    <div class="header-alert">
        <div class="container">
            <div class="header-alert-text">
                Для приобретения товаров по счету <span class="hidden-mobile">(юридические лица)</span>
                перейдите на сайт <a href="https://gipermed.ru/" target="_blank">www.gipermed.ru</a>
            </div>
            <a href="https://gipermed.ru/" class="header-alert-link" target="_blank">Перейти ></a>
        </div>
    </div>
    <div class="head">
        <div class="container">
            <div class="head-row flex-row">
                <div class="head-col head-col-city flex-row-item">
                    <?/*a href="#modal-city" class="head-city-link modal-open-btn">
                        <svg width="24" height="24">
                            <use xlink:href="#icon-cursor"/>
                        </svg>
                        <span><span class="hidden-desktop">Ваш регион доставки:</span> <b><span class="user-region" > </span></b></span>
                    </a*/?>
                    <? $APPLICATION->IncludeComponent(
	"prymery:geoip.city",
	".default",
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"CITY_SHOW" => "Y",
		"CITY_LABEL" => "Ваш регион доставки:",
		"QUESTION_SHOW" => "Y",
		"QUESTION_TEXT" => "Ваш город<br/>#CITY#<span>?</span>",
		"INFO_SHOW" => "N",
		"INFO_TEXT" => "<a href=\"#\" rel=\"nofollow\" target=\"_blank\">Подробнее о доставке</a>",
		"BTN_EDIT" => "Изменить город",
		"SEARCH_SHOW" => "Y",
		"FAVORITE_SHOW" => "Y",
		"CITY_COUNT" => "30",
        "FID" => "1",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"POPUP_LABEL" => "Выберите ваш город",
		"INPUT_LABEL" => "Начните вводить название",
		"MSG_EMPTY_RESULT" => "Ничего не найдено",
		"RELOAD_PAGE" => "N",
		"ENABLE_JQUERY" => "Y",
		"REDIRECT_WAIT_CONFIRM" => "N"
	),
	$component
); ?>
                </div>
                <div class="head-col head-col-menu flex-row-item">
                    <?php $APPLICATION->IncludeComponent("bitrix:menu", "header", array(
                        "ROOT_MENU_TYPE" => "header",
                        "MAX_LEVEL" => "1",
                        "CHILD_MENU_TYPE" => "bottom",
                        "USE_EXT" => "N",
                        "ALLOW_MULTI_SELECT" => "N",
                        "MENU_CACHE_TYPE" => "Y",
                        "MENU_CACHE_TIME" => "360000",
                        "MENU_CACHE_USE_GROUPS" => "N",
                        "MENU_CACHE_GET_VARS" => "N",
                    )); ?>
                </div>
                <div class="head-col head-col-cabinet flex-row-item">
                    <?php if ($user && is_authorized()) { ?>
                        <div class="header-cabinet">
                            <a href="#" class="header-cabinet-link">
                                <svg width="24" height="24">
                                    <use xlink:href="#icon-person"/>
                                </svg>
                                <span><?= $user->login ?></span>
                            </a>
                            <nav class="header-cabinet-nav hidden-tablet">
                                <a href="#" class="header-cabinet-name"><?= $user->name ?></a>
                                <?$APPLICATION->IncludeComponent("bitrix:menu", "header.cabinet", array(
									"ROOT_MENU_TYPE"        => "headercabinet",
									"MAX_LEVEL"             => "1",
									"CHILD_MENU_TYPE"       => "bottom",
									"USE_EXT"               => "N",
									"ALLOW_MULTI_SELECT"    => "N",
									"MENU_CACHE_TYPE"       => "Y",
									"MENU_CACHE_TIME"       => "360000",
									"MENU_CACHE_USE_GROUPS" => "N",
									"MENU_CACHE_GET_VARS"   => "N",
								)); ?>

                                <a href="?logout=yes&<?= bitrix_sessid_get() ?>" class="header-cabinet-exit">Выход</a>
                            </nav>
                        </div>
                    <?php } else { ?>
                        <ul class="head-cabinet-links">
                            <li>
                                <a href="#modal-enter" class="modal-open-btn">
                                    Регистрация
                                </a>
                            </li>
                            <li>
                                <a href="#modal-enter" class="modal-open-btn">
                                    Вход
                                </a>
                            </li>
                        </ul>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>

    <div class="header-body">
        <div class="container">
            <div class="header-row flex-row">
                <div class="header-col header-col-nav-open flex-row-item">
                    <a href="#" class="header-nav-open" aria-label="Меню"></a>
                </div>
                <div class="header-col header-col-logo flex-row-item">
                    <a href="/" class="logo" aria-label="На Главную страницу сайта">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/logo.svg" alt="" height="36">
                    </a>
                </div>
                <div class="header-col header-col-contacts flex-row-item">
                    <div class="header-contacts">
                        <a href="#" class="header-contacts-open" aria-label="Открыть контакты">
                            <svg width="24" height="24">
                                <use xlink:href="#icon-phone"/>
                            </svg>
                            <span>
                                <?php $APPLICATION->IncludeComponent("bitrix:main.include", "", array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => "/include/phone.php"
                                )) ?>
                            </span>
                            <i>
                                <svg width="24" height="24">
                                    <use xlink:href="#icon-chevron-down"/>
                                </svg>
                            </i>
                        </a>
                        <div class="header-contacts-body">
                            <ul class="contacts-tels">
                                <li>
                                    <a href="tel:<?= include_content_phone('/phone.php') ?>">
                                        <b>
                                            <?php $APPLICATION->IncludeComponent("bitrix:main.include", "", array(
                                                "AREA_FILE_SHOW" => "file",
                                                "PATH" => "/include/phone.php"
                                            )) ?>
                                        </b>
                                        <span>Для Москвы</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="tel:<?= include_content_phone('/phone-tp.php') ?>">
                                        <b>
                                            <?php $APPLICATION->IncludeComponent("bitrix:main.include", "", array(
                                                "AREA_FILE_SHOW" => "file",
                                                "PATH" => "/include/phone-tp.php"
                                            )) ?>
                                        </b>
                                        <span>Бесплатный звонок по РФ</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="header-contacts-links">
                                <li>
                                    <a href="#modal-feedback" class="modal-open-btn">
                                        <svg width="16" height="16">
                                            <use xlink:href="#icon-email"/>
                                        </svg>
                                        <span>Написать письмо</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#modal-recall" class="modal-open-btn">
                                        <svg width="16" height="16">
                                            <use xlink:href="#icon-call-back"/>
                                        </svg>
                                        <span>Заказать звонок</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header-col header-col-search flex-row-item">
                    <?$APPLICATION->IncludeComponent(
	"bitrix:search.title", 
	"header", 
	array(
		"SHOW_INPUT" => "Y",
		"INPUT_ID" => "title-search-input",
		"CONTAINER_ID" => "title-search",
		"PRICE_CODE" => array(
			0 => "BASE",
			1 => "RETAIL",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "150",
		"SHOW_PREVIEW" => "Y",
		"PREVIEW_WIDTH" => "75",
		"PREVIEW_HEIGHT" => "75",
		"CONVERT_CURRENCY" => "Y",
		"CURRENCY_ID" => "RUB",
		"PAGE" => "#SITE_DIR#catalog/search.php",
		"NUM_CATEGORIES" => "1",
		"TOP_COUNT" => "10",
		"ORDER" => "date",
		"USE_LANGUAGE_GUESS" => "N",
		"CHECK_DATES" => "Y",
		"SHOW_OTHERS" => "N",
		"CATEGORY_0_TITLE" => "Каталог",
		"CATEGORY_0" => array(
			0 => "iblock_1c_catalog",
		),
		"CATEGORY_0_iblock_news" => array(
			0 => "all",
		),
		"CATEGORY_1_TITLE" => "Форумы",
		"CATEGORY_1" => array(
			0 => "forum",
		),
		"CATEGORY_1_forum" => array(
			0 => "all",
		),
		"CATEGORY_2_TITLE" => "Каталоги",
		"CATEGORY_2" => array(
			0 => "iblock_books",
		),
		"CATEGORY_2_iblock_books" => "all",
		"CATEGORY_OTHERS_TITLE" => "Прочее",
		"COMPONENT_TEMPLATE" => "header",
		"CATEGORY_0_iblock_1c_catalog" => array(
			0 => "75",
		)
	),
	false
);?>
                </div>
                <div class="header-col header-col-links flex-row-item">
                    <ul class="header-links">
                        <li class="visible-tablet">
                            <a href="tel:88003014406"
                               aria-label="Позвонить">
                                <svg width="24"
                                     height="24">
                                    <use xlink:href="#icon-phone"/>
                                </svg>
                            </a>
                        </li>
                        <li class="visible-tablet"
                            aria-label="Кабинет">
                            <a href="/personal/profile/">
                                <svg width="24"
                                     height="24">
                                    <use xlink:href="#icon-person"/>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="/personal/catalog/fav.php"
                               class="header-favorites active">
                                <svg width="24"
                                     height="24">
                                    <use xlink:href="#icon-like"/>
                                </svg>
                                <span class="hidden-mobile">Избранное</span>
                            </a>
                        </li>
                        <li>
                            <a href="/cart/"
                               class="header-cart active">
                                <svg width="24"
                                     height="24">
                                    <use xlink:href="#icon-basket"/>
                                </svg>
                                <span class="hidden-mobile">Корзина</span>
                                <span class="header-cart-count"><?= $basketManager->getQuantity() ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="header-nav">
        <div class="header-alert">
            <div class="container">
                <div class="header-alert-text">Для приобретения товаров по счету <span class="hidden-mobile">(юридические лица)</span>
                    перейдите на сайт <a href="https://gipermed.ru/" target="_blank">www.gipermed.ru</a></div>
                <a href="https://gipermed.ru/" class="header-alert-link" target="_blank">Перейти ></a>
            </div>
        </div>
        <div class="header-catalog">
            <div class="container">
                <a href="#" class="header-catalog-open">
                    <svg width="24" height="24"><use xlink:href="#icon-book"/></svg>
                    <span>Каталог</span>
                    <i><svg width="24" height="24"><use xlink:href="#icon-chevron-down"/></svg></i>
                </a>
                <div class="header-catalog-menu-marker hidden-tablet"></div>
                <ul class="header-catalog-menu-level-1">
                    <li class="header-catalog-menu-view-all header-catalog-menu-close-sub-menu">
                        <a href="#">
                            <i class="visible-tablet">
                                <svg width="24" height="24"><use xlink:href="#icon-chevron-down"/></svg>
                            </i>
                            <span>Все категории</span>
                        </a>
                    </li>
                    <li>
                        <a href="/catalog/">
                            <i class="visible-tablet">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.0968 6.38344H12.5991C12.9679 6.38344 13.2692 6.08555 13.28 5.71521C13.6462 5.70423 13.9408 5.39956 13.9408 5.02659V4.51851C13.9408 4.14554 13.6462 3.84083 13.28 3.82985C13.2692 3.45951 12.9679 3.16162 12.5991 3.16162H12.0968C11.728 3.16162 11.4267 3.45951 11.4159 3.82985C11.0497 3.84083 10.7551 4.14554 10.7551 4.51847V5.02655C10.7551 5.39952 11.0497 5.70419 11.4159 5.71517C11.4267 6.08555 11.728 6.38344 12.0968 6.38344ZM11.3366 5.02655V4.51851C11.3366 4.46292 11.3813 4.41767 11.4363 4.41767H11.6857C11.8574 4.41767 11.9971 4.27637 11.9971 4.10273V3.85059C11.9971 3.795 12.0418 3.74975 12.0968 3.74975H12.5991C12.6541 3.74975 12.6988 3.795 12.6988 3.85059V4.10273C12.6988 4.27641 12.8385 4.41767 13.0102 4.41767H13.2596C13.3146 4.41767 13.3593 4.46292 13.3593 4.51855V5.02659C13.3593 5.08218 13.3146 5.12743 13.2596 5.12743H13.0102C12.8385 5.12743 12.6988 5.26872 12.6988 5.44237V5.69451C12.6988 5.7501 12.6541 5.79538 12.5991 5.79538H12.0968C12.0418 5.79538 11.9971 5.75014 11.9971 5.69454V5.44241C11.9971 5.26872 11.8573 5.12746 11.6857 5.12746H11.4363C11.3813 5.12743 11.3366 5.08218 11.3366 5.02655Z" fill="black"/>
                                    <path d="M18.15 15.1606L14.5266 13.7864C14.4316 13.7504 14.3678 13.6573 14.3678 13.5546V12.2555C15.2576 11.6557 15.881 10.6823 16.0171 9.55862C16.7078 9.5033 17.2533 8.9176 17.2533 8.2051C17.2533 7.50225 16.7226 6.92247 16.0453 6.85378V4.08174C16.0453 3.55437 15.7688 3.05614 15.3236 2.78146L14.6166 2.34509C14.2507 2.11934 13.8308 2 13.4023 2H11.1803C10.7517 2 10.3318 2.11934 9.96599 2.34509L9.25888 2.78146C8.81375 3.05614 8.53727 3.55437 8.53727 4.08174V6.85045C7.8393 6.89824 7.28583 7.48735 7.28583 8.20514C7.28583 8.93266 7.85438 9.52832 8.56576 9.56172C8.70265 10.6841 9.32579 11.6562 10.2148 12.2555V13.5546C10.2148 13.6572 10.151 13.7504 10.056 13.7864L6.43256 15.1606C5.15177 15.6463 4.29126 16.9021 4.29126 18.2854V20.0934C4.29126 20.2558 4.42144 20.3875 4.58201 20.3875C4.74259 20.3875 4.87277 20.2558 4.87277 20.0934V18.2854C4.87277 17.1459 5.58166 16.1114 6.63671 15.7112L7.75948 15.2854V17.1671C7.26384 17.2978 6.89695 17.7542 6.89695 18.2958C6.89695 18.939 7.4143 19.4622 8.05024 19.4622C8.68617 19.4622 9.20352 18.939 9.20352 18.2958C9.20352 17.7542 8.83659 17.2978 8.34099 17.1671V15.0649L8.50722 15.0018C8.51501 15.0091 8.52319 15.0162 8.53196 15.0227L9.25159 15.5626C10.1373 16.2272 11.1884 16.5784 12.2913 16.5784C13.3941 16.5784 14.4453 16.2272 15.331 15.5626L16.052 15.0217C16.0603 15.0155 16.0681 15.0088 16.0756 15.0019L16.478 15.1545V16.9213C15.7523 16.9707 15.1768 17.583 15.1768 18.3292V20.658C15.1768 20.8204 15.3069 20.9521 15.4675 20.9521H15.9103C16.071 20.9521 16.2011 20.8204 16.2011 20.658C16.2011 20.4956 16.071 20.364 15.9103 20.364H15.7583V18.3292C15.7583 17.8752 16.1235 17.5058 16.5724 17.5058H16.932C17.3809 17.5058 17.7461 17.8752 17.7461 18.3292V20.364H17.5956C17.435 20.364 17.3048 20.4956 17.3048 20.658C17.3048 20.8204 17.435 20.9521 17.5956 20.9521H18.0368C18.1974 20.9521 18.3276 20.8204 18.3276 20.658V18.3292C18.3276 17.5944 17.7695 16.9893 17.0595 16.9239V15.3751L17.9458 15.7113C19.0009 16.1114 19.7098 17.1459 19.7098 18.2855V21.3993C19.7098 21.4062 19.7042 21.4119 19.6973 21.4119H4.88525C4.87839 21.4119 4.87277 21.4062 4.87277 21.3993V21.2696C4.87277 21.1072 4.74259 20.9756 4.58201 20.9756C4.42144 20.9756 4.29126 21.1072 4.29126 21.2696V21.3993C4.29126 21.7305 4.55774 22 4.88525 22H19.6973C20.0248 22 20.2913 21.7305 20.2913 21.3993V18.2855C20.2913 16.9021 19.4307 15.6463 18.15 15.1606ZM8.62201 18.2958C8.62201 18.6147 8.36553 18.8741 8.05024 18.8741C7.73494 18.8741 7.47846 18.6147 7.47846 18.2958C7.47846 17.977 7.73494 17.7176 8.05024 17.7176C8.36553 17.7176 8.62201 17.977 8.62201 18.2958ZM16.6718 8.20518C16.6718 8.58317 16.4009 8.89772 16.0453 8.96245V7.44791C16.4009 7.5126 16.6718 7.82719 16.6718 8.20518ZM7.86729 8.20518C7.86729 7.8119 8.16045 7.48716 8.53723 7.44121V8.9692C8.16045 8.92321 7.86729 8.59842 7.86729 8.20518ZM9.11877 9.09426V7.43846H10.7118C10.8724 7.43846 11.0026 7.30681 11.0026 7.14442C11.0026 6.98202 10.8724 6.85037 10.7118 6.85037H9.11877V4.08174C9.11877 3.75797 9.28853 3.45208 9.5618 3.28346L10.2689 2.84713C10.5435 2.67768 10.8586 2.58809 11.1803 2.58809H13.4023C13.724 2.58809 14.0391 2.67768 14.3137 2.84713L15.0208 3.28346C15.294 3.45208 15.4638 3.75797 15.4638 4.08174V6.85037H11.8748C11.7143 6.85037 11.5841 6.98202 11.5841 7.14442C11.5841 7.30681 11.7143 7.43846 11.8748 7.43846H15.4638V9.09426C15.4638 10.8634 14.0406 12.3027 12.2913 12.3027C10.542 12.3027 9.11877 10.8634 9.11877 9.09426ZM14.9845 15.0904C14.1997 15.6792 13.2684 15.9904 12.2913 15.9904C11.3141 15.9904 10.3828 15.6792 9.59805 15.0904L9.15343 14.7568L10.2601 14.3371C10.5808 14.2155 10.7963 13.901 10.7963 13.5546V12.5764C11.2546 12.7785 11.7602 12.8908 12.2913 12.8908C12.8224 12.8908 13.3279 12.7785 13.7863 12.5764V13.5546C13.7863 13.901 14.0018 14.2155 14.3224 14.3371L15.4291 14.7568L14.9845 15.0904Z" fill="black"/>
                                </svg>
                                <svg width="24" height="24"><use xlink:href="#icon-chevron-down"/></svg>
                            </i>
                            <span>Медицинские изделия</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="visible-tablet">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.596 17.268C14.596 18.3043 14.596 19.3275 14.596 20.3769C14.6649 20.3769 14.7272 20.3769 14.7896 20.3769C16.0787 20.3769 17.3711 20.3769 18.6602 20.3769C18.7258 20.3769 18.7914 20.3736 18.857 20.3835C18.9981 20.4 19.1063 20.5184 19.1194 20.6566C19.1326 20.8013 19.0407 20.9428 18.8964 20.979C18.8341 20.9954 18.7652 20.9987 18.7029 20.9987C15.7507 20.9987 12.7985 20.9987 9.8463 20.9987C9.78725 20.9987 9.72493 20.9954 9.66588 20.9823C9.52156 20.9494 9.41987 20.8112 9.42643 20.6697C9.43627 20.525 9.5478 20.4 9.69541 20.3835C9.76101 20.3769 9.82662 20.3769 9.89222 20.3769C11.1781 20.3769 12.4606 20.3769 13.7465 20.3769C13.8121 20.3769 13.8744 20.3769 13.9564 20.3769C13.9597 20.3111 13.9662 20.2585 13.9662 20.2059C13.9662 19.2847 13.963 18.3635 13.9695 17.4424C13.9695 17.3009 13.9334 17.2614 13.7891 17.2483C11.3355 17.0575 9.38379 15.9587 7.94706 13.9584C7.02532 12.6721 6.57921 11.218 6.53985 9.63556C6.53329 9.30657 6.63497 9.20459 6.96627 9.20459C7.22213 9.20459 7.48127 9.2013 7.73712 9.2013C7.74696 9.2013 7.7568 9.19472 7.7732 9.18814C7.81585 8.89534 7.85193 8.59597 7.90113 8.29988C8.01594 7.62546 8.25211 6.99052 8.57686 6.38848C8.68182 6.19438 8.86223 6.12858 9.02624 6.2174C9.18697 6.30623 9.22634 6.48717 9.11809 6.68785C8.61622 7.62546 8.36692 8.62886 8.403 9.69149C8.47189 11.6128 9.28866 13.1623 10.8336 14.2841C13.6382 16.3205 17.4925 15.5244 19.3064 12.5668C20.8744 10.0139 20.2052 6.56942 17.7975 4.79619C15.3111 2.96045 11.9784 3.29602 9.88566 5.59233C9.85942 5.62194 9.83318 5.64826 9.80693 5.67458C9.67245 5.79959 9.50187 5.80946 9.37723 5.7009C9.24602 5.58575 9.22634 5.39494 9.35426 5.26006C9.62652 4.97713 9.89878 4.68762 10.2006 4.43759C11.1945 3.62171 12.3458 3.14139 13.6218 3.02954C15.8261 2.83873 17.686 3.57236 19.1621 5.23045C20.1462 6.33584 20.6546 7.65178 20.7563 9.12563C20.7563 9.14208 20.7628 9.15853 20.7694 9.2013C20.9695 9.2013 21.1761 9.2013 21.3795 9.2013C21.4615 9.2013 21.5435 9.2013 21.6255 9.2013C21.8912 9.20459 22.0093 9.31644 21.9995 9.58292C21.9043 12.4122 20.6677 14.5999 18.2928 16.1231C17.2038 16.8206 15.9934 17.1759 14.7043 17.2516C14.678 17.2549 14.6485 17.2614 14.596 17.268ZM20.7727 9.83295C20.5627 13.3136 17.8041 15.9093 14.5042 16.0212C12.9035 16.0771 11.4569 15.6033 10.2104 14.5934C8.70806 13.3728 7.90441 11.7773 7.7732 9.83295C7.56983 9.83295 7.3763 9.83295 7.18277 9.83295C7.19261 11.6259 8.13403 14.0736 10.4171 15.4948C12.9625 17.0772 15.5834 17.0937 18.1223 15.4915C20.1658 14.2019 21.2024 12.2576 21.3926 9.83295C21.1696 9.83295 20.976 9.83295 20.7727 9.83295Z" fill="black"/>
                                    <path d="M2.41331 14.975C2.41331 14.9059 2.41331 14.8401 2.41331 14.7743C2.41331 13.9848 2.41003 13.1952 2.41659 12.4057C2.41987 11.8266 2.87254 11.3299 3.42689 11.2772C3.89924 11.2312 4.26334 11.5503 4.26662 12.0273C4.2699 12.9485 4.26662 13.8696 4.26662 14.7908C4.26662 14.85 4.26662 14.9092 4.26662 14.9783C4.32567 14.9882 4.37159 14.9948 4.41751 15.0013C4.56512 15.0277 4.65041 15.1165 4.67337 15.2612C4.67993 15.3106 4.67993 15.3599 4.67993 15.4093C4.67993 16.9983 4.67993 18.5906 4.67993 20.1796C4.67993 20.4855 4.58808 20.7454 4.30271 20.8935C4.19118 20.9527 4.05341 20.9856 3.92876 20.9889C3.53514 21.002 3.14151 20.9987 2.74789 20.9922C2.29522 20.9856 2 20.6796 2 20.2191C2 18.6301 2 17.0378 2 15.4488C2 15.1066 2.05576 15.0375 2.41331 14.975ZM2.63636 15.6198C2.6298 15.6527 2.62324 15.6758 2.62324 15.6955C2.62324 17.2023 2.62324 18.7057 2.61996 20.2125C2.61996 20.3474 2.68884 20.377 2.80693 20.377C3.14479 20.3737 3.48265 20.377 3.8238 20.377C4.05341 20.377 4.06653 20.3638 4.06653 20.1368C4.06653 18.6926 4.06653 17.245 4.06653 15.8008C4.06653 15.7416 4.05997 15.6856 4.05669 15.6198C3.5745 15.6198 3.11199 15.6198 2.63636 15.6198ZM3.6401 13.0406C3.43017 13.0801 3.23664 13.1196 3.03983 13.159C3.03983 13.3498 3.03983 13.5407 3.03983 13.7446C3.2432 13.7446 3.43673 13.7446 3.6401 13.7446C3.6401 13.5045 3.6401 13.2709 3.6401 13.0406ZM3.63682 14.3664C3.43345 14.3763 3.23992 14.3861 3.04967 14.396C3.04311 14.5539 3.03655 14.7086 3.02999 14.8665C3.02999 14.8829 3.02343 14.9059 3.03327 14.9158C3.05623 14.9454 3.08575 14.9915 3.11527 14.9915C3.28584 14.9981 3.45969 14.9948 3.6401 14.9948C3.63682 14.7776 3.63682 14.5868 3.63682 14.3664ZM3.17431 12.5076C3.38097 12.5109 3.63354 12.2609 3.64338 12.0504C3.64994 11.9385 3.59746 11.8859 3.48593 11.8924C3.28256 11.9056 3.03983 12.1458 3.02999 12.3497C3.02999 12.4484 3.06935 12.5109 3.17431 12.5076Z" fill="black"/>
                                    <path d="M6.67095 18.3077C6.99241 18.3077 7.31715 18.3077 7.63861 18.3077C8.08144 18.311 8.38322 18.6005 8.39306 19.0447C8.39962 19.4493 8.4029 19.8573 8.39306 20.2619C8.38322 20.6797 8.10112 20.9824 7.68125 20.9923C6.99897 21.0054 6.31669 20.9988 5.63112 20.9955C5.41463 20.9955 5.29982 20.8738 5.29982 20.6501C5.29654 19.9823 5.29654 19.3144 5.29982 18.6433C5.29982 18.4163 5.42119 18.3077 5.65409 18.3077C5.99523 18.3044 6.33309 18.3077 6.67095 18.3077ZM5.92962 18.9295C5.92962 19.4164 5.92962 19.8902 5.92962 20.3771C6.51022 20.3771 7.0777 20.3771 7.64517 20.3771C7.75014 20.3771 7.77966 20.3047 7.77966 20.2093C7.77966 19.8375 7.77966 19.4625 7.77966 19.0907C7.77966 18.9854 7.74358 18.9262 7.62877 18.9295C7.06786 18.9295 6.51022 18.9295 5.92962 18.9295Z" fill="black"/>
                                    <path d="M19.5361 9.24413C19.5361 9.31979 19.5361 9.39875 19.5361 9.47442C19.5328 9.68168 19.4049 9.82314 19.2212 9.81985C19.044 9.81656 18.9227 9.68826 18.9194 9.481C18.903 8.68814 18.7259 7.93477 18.3257 7.25048C17.4367 5.73715 16.1115 4.93442 14.3566 4.85876C14.1401 4.84889 14.0286 4.78967 13.9794 4.63505C13.9105 4.4245 14.0712 4.23039 14.3205 4.23368C15.1078 4.24355 15.8622 4.40476 16.5642 4.76664C18.2666 5.63845 19.2408 7.03335 19.5033 8.93159C19.5164 9.03358 19.5164 9.13885 19.5229 9.24413C19.5295 9.24413 19.5328 9.24413 19.5361 9.24413Z" fill="black"/>
                                </svg>
                                <svg width="24" height="24"><use xlink:href="#icon-chevron-down"/></svg>
                            </i>
                            <span>Красота и фитнес</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="visible-tablet">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.7069 4.88892C21.5451 4.88892 21.414 5.02333 21.414 5.18913V6.71084C21.414 7.44617 20.866 8.05277 20.1666 8.12459V5.18913C20.1666 5.02333 20.0355 4.88892 19.8736 4.88892C19.7118 4.88892 19.5806 5.02333 19.5806 5.18913V8.12455C18.8812 8.05273 18.3333 7.44613 18.3333 6.7108V5.18913C18.3333 5.02333 18.2021 4.88892 18.0403 4.88892C17.8784 4.88892 17.7473 5.02333 17.7473 5.18913V8.14296C17.7473 8.80412 18.0639 9.42453 18.5941 9.80257C18.8232 9.96589 18.9626 10.2255 18.9669 10.497C18.9927 12.0809 18.9548 13.8771 18.8122 14.3195L18.7808 14.4162C18.6155 14.925 18.4097 15.5583 18.4097 16.3673C18.4097 17.3825 19.039 18.1481 19.8736 18.1481C20.7082 18.1481 21.3375 17.3825 21.3375 16.3673C21.3375 15.5584 21.1317 14.925 20.9664 14.4162L20.9351 14.3195C20.7924 13.8771 20.7545 12.0809 20.7803 10.497C20.7847 10.2255 20.9241 9.96593 21.1531 9.80261C21.6833 9.42453 21.9999 8.80412 21.9999 8.143V5.18913C21.9999 5.02333 21.8688 4.88892 21.7069 4.88892ZM20.8184 9.30973C20.4352 9.58297 20.202 10.0231 20.1944 10.487C20.1819 11.2574 20.1581 13.824 20.3787 14.5079L20.4105 14.6059C20.5624 15.0736 20.7515 15.6557 20.7515 16.3673C20.7515 17.0512 20.3823 17.5476 19.8736 17.5476C19.3648 17.5476 18.9956 17.0512 18.9956 16.3673C18.9956 15.6557 19.1847 15.0736 19.3367 14.6059L19.3684 14.5079C19.589 13.824 19.5653 11.2574 19.5527 10.4871C19.5452 10.0231 19.3119 9.58301 18.9287 9.30973C18.5569 9.04462 18.3346 8.61018 18.3333 8.14696C18.6899 8.50847 19.1797 8.73219 19.7198 8.73219C19.8487 8.71061 20.7017 8.86889 21.4137 8.14696C21.4126 8.61014 21.1903 9.04462 20.8184 9.30973Z" fill="black"/>
                                    <path d="M5.14906 10.2063C5.15801 9.95415 5.28027 9.71746 5.48449 9.55695C6.10051 9.07272 6.46824 8.26713 6.46824 7.40198C6.46824 5.96882 5.46602 4.80286 4.23414 4.80286C3.00227 4.80286 2 5.96886 2 7.40202C2 8.26717 2.36773 9.07276 2.98375 9.55699C3.18797 9.71746 3.3102 9.95415 3.31918 10.2063C3.32402 10.3421 3.3268 10.4566 3.32746 10.497C3.35324 12.0809 3.31582 13.8772 3.1727 14.3194C2.94945 15.0092 2.77023 15.5841 2.77023 16.3673C2.77023 17.3824 3.39957 18.148 4.23414 18.148C4.8207 18.148 5.32969 17.7648 5.56254 17.1479C5.6209 16.9933 5.54586 16.8194 5.39496 16.7596C5.2441 16.6998 5.07441 16.7766 5.01605 16.9313C4.87039 17.3172 4.57812 17.5476 4.23414 17.5476C3.72543 17.5476 3.35617 17.0512 3.35617 16.3673C3.35617 15.6654 3.53094 15.1198 3.72902 14.5079C3.95031 13.8242 3.92586 11.2573 3.91332 10.4871C3.91262 10.4446 3.90969 10.3247 3.90473 10.1845C3.88934 9.75281 3.68363 9.35044 3.34035 9.08064C2.86797 8.70925 2.58594 8.08172 2.58594 7.40202C2.58594 6.29994 3.32531 5.40333 4.2341 5.40333C5.14289 5.40333 5.88227 6.29994 5.88227 7.40202C5.88227 8.08172 5.60023 8.70925 5.12789 9.08056C4.78461 9.3504 4.57887 9.75273 4.56352 10.1845C4.55863 10.3221 4.55562 10.443 4.55488 10.487C4.54238 11.2574 4.51797 13.8245 4.73918 14.5079C4.8691 14.9092 4.98695 15.2627 5.05645 15.6905C5.08305 15.854 5.2343 15.9646 5.39355 15.9373C5.55316 15.9101 5.66102 15.7554 5.63445 15.5918C5.55879 15.1261 5.4325 14.7426 5.29551 14.3194C5.15242 13.8774 5.115 12.081 5.14074 10.4971C5.14145 10.4556 5.14434 10.3398 5.14906 10.2063Z" fill="black"/>
                                    <path d="M11.9991 6.42261C10.4005 6.42261 8.89507 7.05559 7.75636 8.20754C6.60808 9.36915 5.97003 10.9195 5.9596 12.5729C5.93815 15.9861 8.63046 18.7808 11.9612 18.8028C11.9746 18.8028 11.9879 18.8029 12.0012 18.8029C13.5998 18.8029 15.1052 18.1699 16.2439 17.0179C17.3922 15.8563 18.0303 14.306 18.0407 12.6526C18.0511 10.9992 17.4325 9.4406 16.2989 8.26395C15.1562 7.07772 13.6278 6.42261 11.9991 6.42261ZM15.8323 16.5906C14.804 17.631 13.4448 18.2025 12.0011 18.2024C11.9891 18.2024 11.977 18.2024 11.965 18.2023C8.9573 18.1825 6.52616 15.6588 6.54554 12.5767C6.55491 11.0837 7.13112 9.68378 8.168 8.63481C10.3112 6.46672 13.7637 6.48693 15.882 8.68573C16.9056 9.74826 17.4642 11.1557 17.4548 12.6487C17.4453 14.1418 16.8691 15.5417 15.8323 16.5906Z" fill="black"/>
                                    <path d="M15.5644 11.4793C15.5631 11.477 15.5616 11.4748 15.5602 11.4726C15.559 11.4707 15.5578 11.4688 15.5566 11.4669C15.1197 10.82 13.8351 10.8795 13.0799 11.0106C12.9645 10.7176 12.7584 10.4387 12.4639 10.1785C12.3413 10.0702 12.1563 10.0842 12.0507 10.2099C11.945 10.3354 11.9587 10.525 12.0812 10.6333C12.2673 10.7976 12.4064 10.9703 12.4938 11.1429C12.2591 11.2083 12.0287 11.2862 11.7783 11.3949C11.2771 10.7215 10.6268 10.1265 9.96824 9.72434C10.2516 9.75416 10.6005 9.8347 10.9853 9.98701C11.1363 10.0468 11.3059 9.9698 11.3642 9.81512C11.4225 9.66045 11.3474 9.48665 11.1964 9.42692C10.3405 9.08812 9.29929 8.95786 8.85328 9.39046C8.85031 9.39334 8.84734 9.39626 8.84441 9.39922C8.84234 9.40142 8.84004 9.40338 8.83796 9.40559C8.83671 9.40695 8.83562 9.40843 8.83437 9.40979C8.83164 9.41283 8.82902 9.41603 8.82636 9.41916C8.61863 9.66237 8.53898 10.0509 8.60863 10.556C8.72726 11.4164 9.27675 12.5811 10.0832 13.1765C9.9823 13.8161 10.2712 14.4118 10.5936 14.8538C10.3069 15.4159 10.1564 15.9852 10.1564 16.5359C10.1564 16.7017 10.2875 16.8362 10.4494 16.8362C10.6112 16.8362 10.7423 16.7017 10.7423 16.5359C10.7423 16.146 10.8357 15.7409 11.0153 15.3336C11.8952 16.1488 12.9378 16.0604 13.9044 15.3146C15.1158 14.38 16.1356 12.3592 15.5644 11.4793ZM14.4698 11.5582C13.8915 11.7673 13.288 12.0903 12.7248 12.4924C12.7344 12.2389 12.7211 11.961 12.6574 11.719C13.2116 11.5668 13.9021 11.4754 14.4698 11.5582ZM9.18882 10.472C9.15953 10.2595 9.16578 10.0998 9.18949 9.98829C9.89691 10.2988 10.6728 10.9341 11.2439 11.6694C10.8393 11.9151 10.503 12.2208 10.2943 12.5846C9.70992 12.076 9.28449 11.1656 9.18882 10.472ZM12.1003 11.9061C12.17 12.2151 12.1424 12.7177 12.0841 13.0008C11.6473 13.3851 11.2479 13.8202 10.9267 14.2931C10.2409 13.1789 10.9089 12.3862 12.1003 11.9061ZM13.5519 14.8349C12.9627 15.2896 12.1101 15.6293 11.3067 14.7885C11.4914 14.4942 11.7198 14.2019 11.9891 13.9164C12.4773 13.9206 13.4308 14.0917 14.0401 14.3832C13.8898 14.5471 13.7268 14.7001 13.5519 14.8349ZM14.4217 13.9071C13.8949 13.621 13.1574 13.4432 12.5722 13.3642C13.3712 12.6872 14.3133 12.1787 15.1352 11.9813C15.1984 12.3909 14.9276 13.1861 14.4217 13.9071Z" fill="black"/>
                                </svg>
                                <svg width="24" height="24"><use xlink:href="#icon-chevron-down"/></svg>
                            </i>
                            <span>Здоровое питание</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="visible-tablet">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.89812 8.35529C9.00576 8.35538 9.10681 8.30349 9.16946 8.21596C9.35996 7.94952 9.49985 7.65033 9.58213 7.33329H12.6668C12.8509 7.33329 13.0001 7.18405 13.0001 6.99996C13.0001 6.81586 12.8509 6.66663 12.6668 6.66663H9.30979C9.14397 6.6666 9.00334 6.78848 8.97979 6.95263C8.93384 7.26833 8.81304 7.56846 8.62746 7.82796C8.5548 7.92948 8.54496 8.0631 8.60197 8.17417C8.65898 8.28524 8.77328 8.35514 8.89812 8.35529Z" fill="black"/>
                                    <path d="M14.0001 7.33329H14.6668C14.8508 7.33329 15.0001 7.18406 15.0001 6.99996C15.0001 6.81586 14.8508 6.66663 14.6668 6.66663H14.0001C13.816 6.66663 13.6667 6.81586 13.6667 6.99996C13.6667 7.18406 13.816 7.33329 14.0001 7.33329Z" fill="black"/>
                                    <path d="M20.9 13.1733C20.5712 13.1074 20.3342 12.819 20.3333 12.4837V12.272C20.7315 12.1312 20.9983 11.7556 21 11.3333V10C21 9.44772 20.5523 9 20 9H18.3333V8.66667C18.3333 7.93029 17.7364 7.33333 17 7.33333C16.6318 7.33333 16.3333 7.03486 16.3333 6.66667V6C16.8856 6 17.3333 5.55228 17.3333 5V3C17.3333 2.44772 16.8856 2 16.3333 2H7.66667C7.11438 2 6.66667 2.44772 6.66667 3V5C6.66667 5.55228 7.11438 6 7.66667 6V6.66667C7.66667 7.03486 7.36819 7.33333 7 7.33333C6.26362 7.33333 5.66667 7.93029 5.66667 8.66667V13H3.33333C2.96514 13 2.66667 13.2985 2.66667 13.6667V15C2.66738 15.2371 2.79442 15.4559 3 15.574V15.8073C2.99994 15.977 2.89215 16.1279 2.73167 16.183C2.30406 16.3134 2.00882 16.704 2 17.151V21C2 21.5523 2.44772 22 3 22H21C21.5523 22 22 21.5523 22 21V14.5163C21.9986 13.8643 21.539 13.3031 20.9 13.1733ZM20.3333 10V11.3333C20.3333 11.5174 20.1841 11.6667 20 11.6667H15.3333C15.1492 11.6667 15 11.5174 15 11.3333V10C15 9.81591 15.1492 9.66667 15.3333 9.66667H20C20.1841 9.66667 20.3333 9.81591 20.3333 10ZM7.33333 5V3C7.33333 2.81591 7.48257 2.66667 7.66667 2.66667H16.3333C16.5174 2.66667 16.6667 2.81591 16.6667 3V5C16.6667 5.18409 16.5174 5.33333 16.3333 5.33333H15.6667V4.33333C15.6667 4.14924 15.5174 4 15.3333 4C15.1492 4 15 4.14924 15 4.33333V5.33333H14.3333V4.33333C14.3333 4.14924 14.1841 4 14 4C13.8159 4 13.6667 4.14924 13.6667 4.33333V5.33333H13V4.33333C13 4.14924 12.8508 4 12.6667 4C12.4826 4 12.3333 4.14924 12.3333 4.33333V5.33333H11.6667V4.33333C11.6667 4.14924 11.5174 4 11.3333 4C11.1492 4 11 4.14924 11 4.33333V5.33333H10.3333V4.33333C10.3333 4.14924 10.1841 4 10 4C9.81591 4 9.66667 4.14924 9.66667 4.33333V5.33333H9V4.33333C9 4.14924 8.85076 4 8.66667 4C8.48257 4 8.33333 4.14924 8.33333 4.33333V5.33333H7.66667C7.48257 5.33333 7.33333 5.18409 7.33333 5ZM7 8C7.73638 8 8.33333 7.40305 8.33333 6.66667V6H15.6667V6.66667C15.6667 7.40305 16.2636 8 17 8C17.3682 8 17.6667 8.29848 17.6667 8.66667V9H15.3333C14.781 9 14.3333 9.44772 14.3333 10V11.3333C14.3351 11.7556 14.6019 12.1312 15 12.272V12.4837C14.9991 12.819 14.7622 13.1074 14.4333 13.1733C13.7943 13.3031 13.3347 13.8643 13.3333 14.5163V21C13.3344 21.1138 13.3552 21.2266 13.3947 21.3333H7.93867C7.97815 21.2266 7.9989 21.1138 8 21V19H11C11.5523 19 12 18.5523 12 18V11.3333C12 10.781 11.5523 10.3333 11 10.3333H6.33333V8.66667C6.33333 8.29848 6.63181 8 7 8ZM6.33333 11H11C11.1841 11 11.3333 11.1492 11.3333 11.3333V18C11.3333 18.1841 11.1841 18.3333 11 18.3333H8V17.1933C7.99982 16.739 7.71131 16.3348 7.28167 16.187C7.12501 16.1464 7.01169 16.0104 7 15.849V15.574C7.20558 15.4559 7.33262 15.2371 7.33333 15V13.6667C7.33333 13.2985 7.03486 13 6.66667 13H6.33333V11ZM3.33333 13.6667H6.66667V15H3.33333V13.6667ZM2.66667 18H4.66667C4.85076 18 5 18.1492 5 18.3333V19.6667C5 19.8508 4.85076 20 4.66667 20H2.66667V18ZM2.66667 21V20.6667H4.66667C5.21895 20.6667 5.66667 20.219 5.66667 19.6667V18.3333C5.66667 17.781 5.21895 17.3333 4.66667 17.3333H2.66667V17.151C2.67836 16.9896 2.79168 16.8536 2.94833 16.813C3.37798 16.6652 3.66648 16.261 3.66667 15.8067V15.6667H6.33333V15.849C6.34209 16.2967 6.63817 16.6878 7.06667 16.8177C7.22649 16.8733 7.33352 17.0241 7.33333 17.1933V21C7.33333 21.1841 7.18409 21.3333 7 21.3333H3C2.81591 21.3333 2.66667 21.1841 2.66667 21ZM21 21.3333H14.3333C14.1492 21.3333 14 21.1841 14 21V14.5163C14.0009 14.181 14.2378 13.8926 14.5667 13.8267C15.2057 13.6969 15.6653 13.1357 15.6667 12.4837V12.3333H19.6667V12.4837C19.668 13.1357 20.1277 13.6969 20.7667 13.8267C21.0955 13.8926 21.3324 14.181 21.3333 14.5163V15H17C16.4477 15 16 15.4477 16 16V19.3333C16 19.8856 16.4477 20.3333 17 20.3333H21.3333V21C21.3333 21.1841 21.1841 21.3333 21 21.3333ZM21.3333 19.6667H17C16.8159 19.6667 16.6667 19.5174 16.6667 19.3333V16C16.6667 15.8159 16.8159 15.6667 17 15.6667H21.3333V19.6667Z" fill="black"/>
                                </svg>
                                <svg width="24" height="24"><use xlink:href="#icon-chevron-down"/></svg>
                            </i>
                            <span>Бады</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="visible-tablet">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.4167 15.75H21.2402C21.5696 15.3841 21.7513 14.9089 21.75 14.4167C21.75 13.2708 20.8955 12.6958 20.3247 12.5055C20.2647 12.3927 20.1784 12.2961 20.0732 12.2237C19.968 12.1513 19.847 12.1053 19.7203 12.0895C19.5935 12.0737 19.4649 12.0885 19.3451 12.1329C19.2253 12.1772 19.118 12.2496 19.0321 12.3441L18.9275 12.4592C18.7511 12.4793 18.5788 12.5264 18.4167 12.5987V11.5547L18.8476 11.1237C18.9552 11.0162 19.0301 10.8803 19.0636 10.7319C19.0971 10.5835 19.0878 10.4286 19.0369 10.2853C18.986 10.1419 18.8954 10.0159 18.7758 9.92192C18.6562 9.82791 18.5124 9.76975 18.361 9.75416C18.2925 9.55831 18.1648 9.38859 17.9956 9.26842C17.8265 9.14825 17.6242 9.08358 17.4167 9.08333H17.0833C16.8182 9.08364 16.564 9.1891 16.3766 9.37656C16.1891 9.56403 16.0836 9.81821 16.0833 10.0833V12.4167H15.4167V11.7427C15.4169 11.4818 15.3404 11.2265 15.1967 11.0086C15.053 10.7907 14.8485 10.6198 14.6085 10.5172L13.0189 9.83591L12.8653 9.37529C12.8163 9.22804 12.7306 9.09569 12.6163 8.99072C12.502 8.88576 12.3629 8.81163 12.212 8.77534C12.0611 8.73905 11.9035 8.74179 11.7539 8.7833C11.6044 8.8248 11.4679 8.90371 11.3573 9.01258C11.2676 8.97204 11.1699 8.95209 11.0715 8.95419C10.9731 8.95628 10.8764 8.98038 10.7885 9.02471L10.294 9.23833C10.1833 9.15356 10.0512 9.1012 9.91247 9.08708C9.77375 9.07296 9.63382 9.09764 9.5083 9.15837C9.38277 9.2191 9.27658 9.31349 9.20154 9.43102C9.12651 9.54855 9.08558 9.68461 9.08333 9.82404L8.59625 9.94775L8.34346 8.68479L8.09166 7.42554L8.21079 6.95796L8.91279 7.25416C9.13068 7.34686 9.37445 7.359 9.60047 7.28842C9.8265 7.21784 10.02 7.06913 10.1465 6.86891L10.4333 6.41666H10.75C10.8334 6.41667 10.9138 6.3854 10.9752 6.32905C11.0367 6.27269 11.0748 6.19533 11.0821 6.11225L11.1654 5.15525C11.2312 4.96933 11.4167 4.41579 11.4167 4.08333C11.4167 4.064 11.4161 4.04512 11.4157 4.02625C11.4157 4.02208 11.4167 4.01792 11.4167 4.01333C11.416 3.41327 11.1773 2.83798 10.753 2.41367C10.3287 1.98936 9.75339 1.75068 9.15333 1.75H8.73791C8.27741 1.75004 7.82475 1.86931 7.42403 2.09622C7.0233 2.32312 6.68815 2.64992 6.45121 3.04479C6.28551 3.32098 6.02643 3.52874 5.72083 3.63046L4.3705 4.08046C4.03424 4.1927 3.73648 4.39755 3.51144 4.67146C3.2864 4.94537 3.14322 5.27722 3.09834 5.62886C3.05347 5.98051 3.10873 6.33768 3.25777 6.65932C3.40681 6.98096 3.64358 7.25403 3.94087 7.44712L2.95121 9.52212C2.16018 11.1799 1.74977 12.9936 1.75 14.8304V21.75H2.41667V18.4167H4.05167L3.75137 21.7198L4.41529 21.7802L4.72108 18.4167H6.05167L5.75137 21.7198L6.41529 21.7802L6.72108 18.4167H7.75C7.80331 18.4167 7.85585 18.4039 7.9032 18.3794C7.95055 18.3549 7.99133 18.3194 8.02212 18.2758C8.05292 18.2323 8.07282 18.182 8.08016 18.1292C8.08751 18.0764 8.08208 18.0226 8.06433 17.9724L6.92717 14.75H10.9167C11.1376 14.7497 11.3494 14.6619 11.5056 14.5056C11.6619 14.3494 11.7497 14.1376 11.75 13.9167V13.25C11.7497 13.0291 11.6619 12.8172 11.5056 12.661C11.3494 12.5048 11.1376 12.4169 10.9167 12.4167H10.75V12.3433C10.7503 12.2421 10.73 12.1418 10.6905 12.0486C10.651 11.9554 10.5929 11.8712 10.52 11.801L11.1169 11.5622C11.1531 11.6369 11.2159 11.6953 11.2929 11.7262L12.75 12.309V14.75C12.7496 15.1108 12.867 15.4619 13.0842 15.75H11.0833C10.9949 15.75 10.9101 15.7851 10.8476 15.8476C10.7851 15.9101 10.75 15.9949 10.75 16.0833V17.4167C10.75 17.5051 10.7851 17.5899 10.8476 17.6524C10.9101 17.7149 10.9949 17.75 11.0833 17.75H11.75V21.0833C11.75 21.1717 11.7851 21.2565 11.8476 21.319C11.9101 21.3815 11.9949 21.4167 12.0833 21.4167H21.4167C21.5051 21.4167 21.5899 21.3815 21.6524 21.319C21.7149 21.2565 21.75 21.1717 21.75 21.0833V16.0833C21.75 15.9949 21.7149 15.9101 21.6524 15.8476C21.5899 15.7851 21.5051 15.75 21.4167 15.75ZM19.0775 13.1167H19.0833C19.1298 13.1167 19.1757 13.107 19.2182 13.0882C19.2607 13.0694 19.2988 13.0419 19.33 13.0075L19.5254 12.7926C19.5376 12.7792 19.5525 12.7685 19.569 12.7611C19.5856 12.7538 19.6035 12.75 19.6217 12.75C19.7186 12.75 19.7562 12.8533 19.7909 12.926C19.8101 12.9718 19.8401 13.0123 19.8783 13.044C19.9164 13.0758 19.9617 13.0979 20.0102 13.1085C20.2057 13.1625 20.3899 13.251 20.5543 13.3699C20.9054 13.6243 21.0835 13.9765 21.0835 14.4167C21.0833 14.7702 20.9428 15.1093 20.6928 15.3593C20.4428 15.6093 20.1037 15.7498 19.7502 15.75H19.4168C19.2098 15.7493 19.0058 15.7007 18.8208 15.608C18.6357 15.5153 18.4746 15.381 18.3502 15.2156C18.3943 15.0643 18.4167 14.9076 18.4167 14.75V13.3947C18.5958 13.2247 18.8307 13.1258 19.0775 13.1167ZM9.49871 10.4064C9.57055 10.3882 9.63427 10.3465 9.67978 10.288C9.72529 10.2295 9.75 10.1575 9.75 10.0833V9.83637C9.75 9.81724 9.75635 9.79864 9.76806 9.78351C9.77977 9.76838 9.79618 9.75756 9.8147 9.75276C9.83322 9.74796 9.85282 9.74944 9.8704 9.75698C9.88799 9.76452 9.90258 9.77769 9.91187 9.79441C9.95114 9.8651 10.0148 9.9191 10.0909 9.94636C10.167 9.97361 10.2505 9.97227 10.3257 9.94258L10.8724 9.7267C10.8815 9.72312 10.8904 9.71916 10.8991 9.71479L11.0833 9.62266V10.8576L6.59275 12.6539C6.38887 12.7354 6.1681 12.7658 5.94978 12.7423C5.73145 12.7188 5.52221 12.6421 5.34037 12.519C5.15854 12.3959 5.00965 12.2301 4.90672 12.0361C4.8038 11.8421 4.74999 11.6259 4.75 11.4063V7.75C4.75 7.57319 4.82024 7.40362 4.94526 7.27859C5.07029 7.15357 5.23985 7.08333 5.41667 7.08333C5.59348 7.08333 5.76305 7.15357 5.88807 7.27859C6.01309 7.40362 6.08333 7.57319 6.08333 7.75V10.8452C6.08333 10.896 6.09492 10.9461 6.11722 10.9917C6.13953 11.0373 6.17195 11.0772 6.21201 11.1084C6.25208 11.1395 6.29874 11.1611 6.34842 11.1715C6.39811 11.1819 6.44951 11.1808 6.49871 11.1683L9.49871 10.4064ZM6.75 10.4167V8.63829C7.02819 8.88095 7.37419 9.03236 7.74121 9.07204L7.94954 10.1121L6.75 10.4167ZM10.505 5.05442L10.4445 5.75H10.25C10.1938 5.75 10.1386 5.76418 10.0894 5.79124C10.0402 5.81831 9.99858 5.85736 9.9685 5.90479L9.58358 6.51175C9.54136 6.57847 9.47678 6.62801 9.4014 6.65149C9.32601 6.67498 9.24473 6.67089 9.17208 6.63996L8.47041 6.34391C8.38203 6.30647 8.28659 6.28856 8.19064 6.29143C8.09469 6.29429 8.00049 6.31786 7.9145 6.36052C7.8285 6.40317 7.75274 6.46391 7.6924 6.53857C7.63207 6.61323 7.58858 6.70005 7.56491 6.79308L7.427 7.33433C7.41468 7.38266 7.41336 7.43313 7.42312 7.48204L7.6 8.36625C7.32577 8.28144 7.0939 8.09579 6.95117 7.84675L6.7095 7.42366C6.69217 7.35508 6.66936 7.28801 6.64129 7.22308C6.70135 7.16571 6.75758 7.10447 6.80962 7.03975L8.20129 5.29096C8.23431 5.24946 8.25695 5.20069 8.26733 5.14868C8.27772 5.09668 8.27555 5.04295 8.261 4.99196L8.16637 4.661C8.15376 4.61593 8.15343 4.56832 8.16541 4.52308C8.17739 4.47784 8.20124 4.43663 8.2345 4.40371L8.24241 4.39579C8.28874 4.34967 8.35144 4.32377 8.41681 4.32377C8.48218 4.32377 8.54488 4.34967 8.59121 4.39579L8.84746 4.65246C8.88632 4.69139 8.93422 4.7201 8.98688 4.73602C9.03954 4.75194 9.09532 4.75458 9.14925 4.74371L10.689 4.43333C10.6423 4.61762 10.577 4.82358 10.5239 4.96971C10.5139 4.997 10.5076 5.02548 10.505 5.05442ZM3.97946 5.15592C4.12856 4.94853 4.3393 4.79348 4.58167 4.71287L5.93167 4.26287C6.38828 4.11088 6.77542 3.8005 7.02308 3.38787C7.20077 3.09174 7.4521 2.84664 7.7526 2.67645C8.05311 2.50626 8.39256 2.41676 8.73791 2.41667H9.08333C9.46748 2.41512 9.84026 2.54696 10.138 2.78967C10.4358 3.03238 10.6401 3.37093 10.716 3.7475L9.19283 4.05454L9.0625 3.92408C8.89098 3.75322 8.65873 3.6573 8.41662 3.65734C8.17452 3.65738 7.9423 3.75337 7.77083 3.92429L7.76291 3.93221C7.64564 4.04928 7.56178 4.19556 7.52002 4.35592C7.47826 4.51628 7.48013 4.68489 7.52541 4.84429L7.57279 5.01L6.28825 6.62416C6.26917 6.64808 6.2493 6.67118 6.22867 6.69346C5.9507 6.47914 5.5993 6.38336 5.25103 6.42699C4.90276 6.47061 4.58584 6.65011 4.36933 6.92637C4.22025 6.8424 4.09056 6.72792 3.98875 6.5904C3.88694 6.45288 3.81529 6.29542 3.7785 6.12832C3.7417 5.96122 3.74059 5.78823 3.77522 5.62067C3.80986 5.4531 3.87947 5.29474 3.9795 5.15592H3.97946ZM2.41667 17.75V14.8304C2.41636 13.0928 2.8046 11.3771 3.55296 9.80895L4.08333 8.697V11.4063C4.08399 11.8776 4.24999 12.3338 4.55241 12.6953C4.85483 13.0568 5.2745 13.3007 5.73829 13.3846L7.27887 17.75H2.41667ZM10.9167 13.0833C10.9609 13.0833 11.0033 13.1009 11.0345 13.1321C11.0658 13.1634 11.0833 13.2058 11.0833 13.25V13.9167C11.0833 13.9609 11.0658 14.0033 11.0345 14.0345C11.0033 14.0658 10.9609 14.0833 10.9167 14.0833H6.92083C6.84155 14.0831 6.76243 14.076 6.68437 14.062L6.44554 13.3853C6.58063 13.3614 6.71292 13.3237 6.84033 13.2728L7.31416 13.0833H9.41666C9.48662 13.0833 9.55479 13.0613 9.61155 13.0204C9.6683 12.9795 9.71074 12.9218 9.73287 12.8555L9.91279 12.316C9.91863 12.2985 9.92982 12.2833 9.94477 12.2725C9.95972 12.2617 9.97768 12.2559 9.99612 12.2558C10.0096 12.2559 10.0229 12.2591 10.035 12.2652C10.0494 12.2725 10.0616 12.2837 10.0701 12.2975C10.0787 12.3112 10.0832 12.3271 10.0833 12.3433V12.75C10.0833 12.8384 10.1184 12.9232 10.181 12.9857C10.2435 13.0482 10.3283 13.0833 10.4167 13.0833H10.9167ZM9.17646 12.4167H8.98062L9.20637 12.3264L9.17646 12.4167ZM13.4167 14.75V12.0833C13.4167 12.0167 13.3967 11.9516 13.3594 11.8964C13.322 11.8413 13.269 11.7986 13.2071 11.7738L11.75 11.191V9.66446C11.75 9.60561 11.7709 9.54869 11.809 9.50386C11.8472 9.45904 11.9 9.42925 11.9581 9.41983C12.0162 9.4104 12.0757 9.42195 12.1261 9.45241C12.1764 9.48287 12.2143 9.53025 12.2329 9.58608L12.4338 10.1887C12.4487 10.2334 12.4728 10.2744 12.5047 10.309C12.5366 10.3437 12.5754 10.3712 12.6187 10.3897L14.3458 11.13C14.4658 11.1813 14.5681 11.2667 14.64 11.3756C14.7118 11.4846 14.7501 11.6122 14.75 11.7427V12.75C14.75 12.8384 14.7851 12.9232 14.8476 12.9857C14.9101 13.0482 14.9949 13.0833 15.0833 13.0833H16.4167C16.5051 13.0833 16.5899 13.0482 16.6524 12.9857C16.7149 12.9232 16.75 12.8384 16.75 12.75V10.0833C16.7501 9.99496 16.7852 9.91023 16.8477 9.84774C16.9102 9.78525 16.995 9.7501 17.0833 9.75H17.4167C17.505 9.7501 17.5898 9.78525 17.6523 9.84774C17.7147 9.91023 17.7499 9.99496 17.75 10.0833C17.75 10.1717 17.7851 10.2565 17.8476 10.319C17.9101 10.3815 17.9949 10.4167 18.0833 10.4167H18.2786C18.3059 10.4167 18.3326 10.4248 18.3553 10.4399C18.378 10.4551 18.3957 10.4767 18.4062 10.5019C18.4166 10.5271 18.4193 10.5549 18.414 10.5817C18.4087 10.6085 18.3955 10.6331 18.3762 10.6524L17.8476 11.181C17.8167 11.2119 17.7921 11.2487 17.7754 11.2891C17.7586 11.3295 17.75 11.3729 17.75 11.4167V14.75C17.7497 15.0151 17.6442 15.2693 17.4568 15.4568C17.2693 15.6442 17.0151 15.7497 16.75 15.75H14.4167C14.1515 15.7497 13.8974 15.6442 13.7099 15.4568C13.5224 15.2693 13.417 15.0151 13.4167 14.75ZM11.4167 16.4167H21.0833V17.0833H11.4167V16.4167ZM21.0833 20.75H12.4167V17.75H21.0833V20.75Z" fill="black"/>
                                </svg>
                                <svg width="24" height="24"><use xlink:href="#icon-chevron-down"/></svg>
                            </i>
                            <span>Мать и дитя</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="visible-tablet">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.58955 6.66275C7.54861 6.77399 7.51511 6.88522 7.46301 6.99262C7.39602 7.12687 7.32903 7.2688 7.23971 7.38387C7.11689 7.5373 6.94569 7.51045 6.87498 7.33017C6.74099 6.98879 6.60329 6.64741 6.49908 6.29835C6.36882 5.85341 6.58468 5.5197 7.02012 5.40846C7.2397 5.35476 7.46301 5.28955 7.6677 5.19366C7.99894 5.04023 8.33017 5.00187 8.68745 5.05557C8.87726 5.08242 9.08196 5.09009 9.26804 5.05173C9.55834 4.99803 9.81886 5.05173 10.0868 5.15146C10.3622 5.25119 10.6414 5.34325 10.9242 5.41997C11.2889 5.52353 11.4378 5.71915 11.4043 6.1104C11.3931 6.25616 11.3522 6.40192 11.3075 6.54384C11.2257 6.78933 11.1401 7.03098 11.0396 7.2688C11.0061 7.34935 10.9317 7.44908 10.8572 7.47209C10.7456 7.50661 10.6339 7.4299 10.5818 7.3225C10.4962 7.14605 10.4329 6.96194 10.3585 6.78166C10.3399 6.73179 10.3138 6.68193 10.2915 6.6359C10.2766 6.63973 10.2655 6.64357 10.2506 6.64741C10.2803 6.87755 10.3064 7.1077 10.3436 7.334C10.3994 7.71374 10.3548 8.07047 10.1129 8.37733C9.98633 8.54227 9.97889 8.7072 10.0905 8.87981C10.3287 9.24037 10.5669 9.5971 10.8088 9.95766C11.0545 10.3259 11.3113 10.6864 11.3708 11.1467C11.3931 11.3193 11.3969 11.4996 11.3931 11.6761C11.3783 12.0865 11.3671 12.5008 11.3262 12.9073C11.2666 13.4865 11.1884 14.0657 11.0991 14.6411C10.9614 15.5502 10.8572 16.4631 10.8684 17.3837C10.8721 17.6905 10.8982 17.9935 10.9242 18.3004C10.9391 18.496 10.9875 18.5421 11.1736 18.5919C11.5271 18.6917 11.7095 18.918 11.7058 19.2632C10.2803 19.2632 8.85121 19.2632 7.41463 19.2632C7.45184 19.2018 7.48906 19.1519 7.50767 19.0982C7.55977 18.9678 7.51139 18.8221 7.3588 18.7569C7.09828 18.6456 7.02385 18.4385 6.9643 18.1815C6.7596 17.3185 6.81171 16.4669 7.07595 15.6346C7.36252 14.737 7.26576 13.874 6.94941 13.0109C6.81915 12.6542 6.72611 12.2821 6.6219 11.9139C6.56607 11.7144 6.63306 11.5687 6.7931 11.4267C7.28437 10.9895 7.44068 10.4333 7.30297 9.78121C7.29181 9.72751 7.31042 9.65463 7.34019 9.60477C7.49278 9.35544 7.65654 9.10996 7.81285 8.86063C7.90961 8.7072 7.90589 8.5461 7.79424 8.40418C7.51883 8.05896 7.48534 7.67155 7.56349 7.25345C7.60071 7.06167 7.6156 6.86988 7.64165 6.67426C7.62304 6.67042 7.60443 6.66658 7.58955 6.66275Z" fill="black"/>
                                    <path d="M3.50305 8.21723C3.59982 8.26709 3.67053 8.30161 3.7338 8.33997C3.89011 8.44354 4.05387 8.53943 4.19901 8.65834C4.31067 8.7504 4.41115 8.75807 4.54513 8.71204C4.91358 8.58546 5.30064 8.54327 5.66909 8.67368C5.91101 8.7619 6.07848 8.70437 6.26829 8.55861C6.43577 8.42819 6.62558 8.32463 6.82655 8.19421C6.83399 8.27093 6.84143 8.31312 6.84143 8.35148C6.84143 8.65834 6.83771 8.9652 6.84516 9.27206C6.84888 9.42165 6.86377 9.57892 6.91215 9.72468C7.11312 10.3537 6.96053 10.8869 6.47671 11.2973C6.24968 11.493 6.21246 11.6963 6.2869 11.9532C6.41716 12.402 6.53625 12.8546 6.68512 13.2958C6.94937 14.0783 6.94937 14.8607 6.71862 15.6509C6.57347 16.1496 6.44321 16.6635 6.48043 17.189C6.51392 17.611 6.58836 18.0329 6.67396 18.4472C6.69629 18.5584 6.82283 18.6543 6.90843 18.7502C6.94564 18.7885 7.0238 18.7924 7.04985 18.8346C7.09823 18.9075 7.15406 18.9995 7.14662 19.0801C7.14289 19.1453 7.0573 19.245 6.99775 19.2565C6.82283 19.2872 6.64046 19.291 6.4581 19.291C5.39369 19.2949 4.32927 19.2949 3.26486 19.2987C3.21648 19.2987 3.1681 19.3102 3.11599 19.3332C3.24253 19.4483 3.39884 19.4675 3.55144 19.479C4.05015 19.5212 4.55258 19.548 5.05501 19.5902C5.48673 19.6286 5.91845 19.6784 6.31667 19.8702C6.65907 20.039 6.8191 20.2922 6.78561 20.6374C6.77072 20.7755 6.73723 20.9059 6.5958 20.9634C6.45065 21.0248 6.30923 21.0094 6.18641 20.9136C6.12314 20.8637 6.06732 20.8062 6.01894 20.7448C5.81796 20.4955 5.55372 20.3881 5.24854 20.365C4.68656 20.3228 4.12458 20.2922 3.56632 20.2461C3.19043 20.2154 2.81826 20.1541 2.46842 19.993C2.09997 19.8242 1.94365 19.5442 2.01809 19.1875C2.05903 19.0034 2.15207 18.8538 2.32327 18.7617C2.37537 18.7348 2.42748 18.7042 2.49819 18.6658C2.45353 18.5622 2.41259 18.4625 2.36793 18.3628C2.08508 17.7529 2.05903 17.12 2.20789 16.4718C2.37537 15.7315 2.71033 15.064 3.06389 14.4081C3.41745 13.7522 3.78963 13.104 3.98688 12.3713C4.0427 12.1604 4.06875 11.9417 4.09108 11.7231C4.10597 11.5812 4.0427 11.4699 3.93105 11.3779C3.56632 11.0749 3.33185 10.699 3.32813 10.2041C3.32813 10.0852 3.35046 9.96249 3.38768 9.85509C3.49561 9.53673 3.52166 9.21069 3.50677 8.88081C3.49561 8.66985 3.50305 8.46272 3.50305 8.21723Z" fill="black"/>
                                    <path d="M16.9534 5.73551C15.6843 5.73551 14.4375 5.73551 13.1721 5.73551C13.1721 7.21994 13.1721 8.69287 13.1721 10.1773C13.12 10.1811 13.0828 10.1888 13.0493 10.1888C12.5208 10.1888 11.9886 10.1888 11.4602 10.1811C11.3932 10.1811 11.3076 10.1351 11.2629 10.0814C11.1215 9.90113 10.9912 9.7055 10.8386 9.48687C10.9168 9.48303 10.9652 9.47536 11.0098 9.47536C11.4415 9.47536 11.877 9.47152 12.3087 9.4792C12.4204 9.4792 12.4687 9.45234 12.4687 9.3296C12.465 8.74657 12.465 8.16353 12.465 7.57666C12.465 7.0013 12.4613 6.42594 12.465 5.85441C12.4687 5.42864 12.6064 5.17932 12.9153 5.07576C13.053 5.02973 13.2056 5.00671 13.3545 5.00288C14.512 4.99904 15.6694 4.99904 16.8306 5.00288C16.9646 5.00288 17.1023 5.02589 17.2251 5.07192C17.5117 5.17932 17.6419 5.42481 17.6456 5.724C17.6568 6.31854 17.6456 6.90924 17.6456 7.50379C17.6456 8.106 17.6531 8.71205 17.6494 9.31426C17.6494 9.44084 17.6866 9.47536 17.8094 9.47536C18.9296 9.47152 20.0499 9.47536 21.1738 9.4792C21.2483 9.4792 21.3227 9.48687 21.3971 9.49837C21.7842 9.57125 21.9591 9.77455 21.9926 10.1773C22.0001 10.2579 22.0001 10.3384 22.0001 10.4228C22.0001 11.5773 22.0001 12.7319 22.0001 13.8826C22.0001 13.8865 22.0001 13.8903 22.0001 13.898C22.0001 14.5424 21.747 14.8032 21.118 14.807C20.329 14.8109 19.5363 14.807 18.7473 14.807C18.4347 14.807 18.1257 14.8071 17.8131 14.8109C17.7685 14.8109 17.7238 14.8109 17.6568 14.8109C17.6568 14.8953 17.6568 14.9605 17.6568 15.0257C17.6568 16.1457 17.6568 17.2658 17.6531 18.3858C17.6531 18.4894 17.6531 18.5968 17.6308 18.7003C17.5638 19.0072 17.374 19.1913 17.0725 19.245C16.9571 19.2642 16.8418 19.268 16.7264 19.268C15.5913 19.268 14.4561 19.268 13.321 19.268C13.2503 19.268 13.1796 19.2642 13.1126 19.2565C12.7516 19.2143 12.5208 18.9919 12.4911 18.6159C12.4687 18.2976 12.4725 17.9754 12.4687 17.6532C12.465 16.7518 12.465 15.8542 12.4687 14.9528C12.4687 14.8301 12.4315 14.7994 12.3161 14.7994C12.0296 14.807 11.743 14.8032 11.4341 14.8032C11.4825 14.5616 11.5234 14.3506 11.5718 14.1435C11.5792 14.1205 11.6351 14.0936 11.6686 14.0936C12.1375 14.0936 12.6064 14.0974 13.0791 14.0974C13.1945 14.0974 13.1721 14.1818 13.1721 14.247C13.1721 15.1523 13.1721 16.0575 13.1721 16.9627C13.1721 17.4422 13.1759 17.9217 13.1684 18.3973C13.1684 18.5162 13.1982 18.5546 13.3173 18.5546C14.4785 18.5507 15.6434 18.5469 16.8045 18.5507C16.9311 18.5507 16.9571 18.5085 16.9571 18.3858C16.9534 17.0203 16.9571 15.6586 16.9571 14.2931C16.9571 14.0898 16.9571 14.0898 17.1507 14.0898C18.4719 14.0898 19.7931 14.0898 21.1143 14.0898C21.3078 14.0898 21.3078 14.0898 21.3078 13.8941C21.3041 12.7166 21.3004 11.539 21.3004 10.3614C21.3004 10.2233 21.2669 10.1811 21.1292 10.1811C19.8005 10.185 18.4681 10.1811 17.1395 10.1773C16.9571 10.1773 16.9571 10.1773 16.9571 9.98935C16.9571 8.62382 16.9571 7.26213 16.9571 5.89661C16.9534 5.85441 16.9534 5.80455 16.9534 5.73551Z" fill="black"/>
                                </svg>
                                <svg width="24" height="24"><use xlink:href="#icon-chevron-down"/></svg>
                            </i>
                            <span>Ветеринария</span>
                        </a>
                    </li>
                    <li class="menu-item-has-children current-menu-item">
                        <a href="#">
                            <i class="visible-tablet">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.32676 15.4058V9.97593H7.07153V8.58447H10.0588V15.4058H8.32676Z" fill="black"/>
                                    <path d="M16.5686 10.3457C16.5686 10.9392 16.2475 11.4647 15.7124 11.7567C16.4615 12.068 16.9287 12.72 16.9287 13.479C16.9287 14.705 15.8388 15.4835 14.136 15.4835C12.4331 15.4835 11.3433 14.7147 11.3433 13.5082C11.3433 12.7297 11.8492 12.068 12.6374 11.7567C12.0633 11.4355 11.6936 10.8907 11.6936 10.2971C11.6936 9.20716 12.6472 8.51636 14.1262 8.51636C15.6247 8.51636 16.5686 9.22668 16.5686 10.3457ZM12.978 13.3331C12.978 13.9072 13.3867 14.2283 14.136 14.2283C14.8852 14.2283 15.3036 13.917 15.3036 13.3331C15.3036 12.7688 14.8852 12.4475 14.136 12.4475C13.3867 12.4475 12.978 12.7687 12.978 13.3331ZM13.1532 10.443C13.1532 10.9296 13.5035 11.202 14.136 11.202C14.7684 11.202 15.1187 10.9296 15.1187 10.443C15.1187 9.93713 14.7684 9.65488 14.136 9.65488C13.5034 9.65488 13.1532 9.93713 13.1532 10.443Z" fill="black"/>
                                    <path d="M19.8111 9.35453C20.099 10.2044 20.2451 11.0934 20.2451 12C20.2451 16.5461 16.5466 20.2446 12.0004 20.2446C7.45429 20.2446 3.75568 16.5461 3.75568 12C3.75568 7.4538 7.45423 3.75538 12.0004 3.75538C12.9071 3.75538 13.7961 3.90133 14.6458 4.18942V2.35468C13.7875 2.11938 12.901 2 12.0004 2C6.48648 2 2.00049 6.48599 2.00049 12C2.00049 17.514 6.48648 22 12.0004 22C17.5144 22 22.0003 17.514 22.0003 12C22.0003 11.0995 21.881 10.2129 21.6457 9.35453H19.8111Z" fill="black"/>
                                    <path d="M19.3119 4.68259V2.76514H17.9331V4.68259H16.0271V6.06127H17.9331V7.97866H19.3119V6.06127H21.2292V4.68259H19.3119Z" fill="black"/>
                                </svg>
                                <svg width="24" height="24"><use xlink:href="#icon-chevron-down"/></svg>
                            </i>
                            <span>Товары для взрослых 18+</span>
                        </a>
                    </li>
                    <li class="hidden-tablet">
                        <a href="#">
                            <span>Все товары</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="header-nav-head visible-tablet">
            <div class="container">
                <a href="#" class="header-nav-close" aria-label="Закрыть">
                    <svg width="24" height="24">
                        <use xlink:href="#icon-close"/>
                    </svg>
                </a>
                <ul class="head-cabinet-links">
                    <li>
                        <a href="#modal-enter" class="modal-open-btn">
                            Регистрация
                        </a>
                    </li>
                    <li>
                        <a href="#modal-enter" class="modal-open-btn">
                            Вход
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="header-catalog">
            <div class="container">

            </div>
        </div>

        <div class="header-nav-mobile visible-tablet">
            <div class="container">
                <div class="header-nav-mobile-menus">
                    <ul class="header-nav-mobile-menu">
                        <li>
                            <a href="#">
                                <i>
                                    <svg width="24" height="24">
                                        <use xlink:href="#icon-discount"/>
                                    </svg>
                                </i>
                                <span>Акции</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i>
                                    <svg width="24" height="24">
                                        <use xlink:href="#icon-bag"/>
                                    </svg>
                                </i>
                                <span>Мои заказы</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i>
                                    <svg width="24" height="24">
                                        <use xlink:href="#icon-like"/>
                                    </svg>
                                </i>
                                <span>Избранное</span>
                            </a>
                        </li>
                        <li>
                            <? $APPLICATION->IncludeComponent( "prymery:geoip.city",
                                "mobile",
                                array(
                                    "COMPONENT_TEMPLATE" => ".default",
                                    "CITY_SHOW" => "Y",
                                    "CITY_LABEL" => "Город:",
                                    "QUESTION_SHOW" => "N",
                                    "QUESTION_TEXT" => "Ваш город<br/>#CITY#?",
                                    "INFO_SHOW" => "N",
                                    "INFO_TEXT" => "<a href=\"#\" rel=\"nofollow\" target=\"_blank\">Подробнее о доставке</a>",
                                    "BTN_EDIT" => "Изменить город",
                                    "SEARCH_SHOW" => "Y",
                                    "FAVORITE_SHOW" => "Y",
                                    "CITY_COUNT" => "30",
                                    "FID" => "1",
                                    "CACHE_TYPE" => "A",
                                    "CACHE_TIME" => "3600",
                                    "COMPOSITE_FRAME_MODE" => "A",
                                    "COMPOSITE_FRAME_TYPE" => "AUTO",
                                    "POPUP_LABEL" => "Выберите ваш город",
                                    "INPUT_LABEL" => "Начните вводить название",
                                    "MSG_EMPTY_RESULT" => "Ничего не найдено"
                                ),
                                $component
                            ); ?>
                        </li>
                        <li>
                            <a href="#">
                                <i>
                                    <svg width="24" height="24">
                                        <use xlink:href="#icon-map"/>
                                    </svg>
                                </i>
                                <span>Адреса магазинов</span>
                            </a>
                        </li>
                    </ul>
                    <?/*ul class="header-nav-mobile-menu">
                        <li>
                            <a href="#">
                                <i>
                                    <svg width="24" height="24">
                                        <use xlink:href="#icon-discount"/>
                                    </svg>
                                </i>
                                <span>Акции</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i>
                                    <svg width="24" height="24">
                                        <use xlink:href="#icon-bag"/>
                                    </svg>
                                </i>
                                <span>Мои заказы</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i>
                                    <svg width="24" height="24">
                                        <use xlink:href="#icon-like"/>
                                    </svg>
                                </i>
                                <span>Избранное</span>
                            </a>
                        </li>
                        <li>
                            <a href="#modal-city" class="modal-open-btn">
                                <i>
                                    <svg width="24" height="24">
                                        <use xlink:href="#icon-location"/>
                                    </svg>
                                </i>
                                <span>Город: Москва</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i>
                                    <svg width="24" height="24">
                                        <use xlink:href="#icon-map"/>
                                    </svg>
                                </i>
                                <span>Адреса магазинов</span>
                            </a>
                        </li>
                    </ul*/?>
                </div>
                <div class="header-nav-mobile-menus">
                    <a href="#" class="header-nav-mobile-about-toggle">
                        <span>О нас</span>
                        <i>
                            <svg width="24" height="24">
                                <use xlink:href="#icon-chevron-down"/>
                            </svg>
                        </i>
                    </a>
                    <ul class="header-nav-mobile-about-menu">
                        <li><a href="#">О компании</a></li>
                        <li><a href="#">Миссия</a></li>
                        <li><a href="#">Вакансии</a></li>
                        <li><a href="#">Контакты</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
<div class="main">
    <?if($GLOBALS["PAGE"][1]):?>
        <div class="container">
        <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "main",[""]);?>
    <?endif;?>