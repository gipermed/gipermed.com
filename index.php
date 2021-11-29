<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

/**
 * @var CMain $APPLICATION
 */

$APPLICATION->SetTitle("Gipermed");
$APPLICATION->SetPageProperty('body-class', 'home');

?><main class="main">
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"slider.main",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("NAME","PREVIEW_TEXT","PREVIEW_PICTURE",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "3",
		"IBLOCK_TYPE" => "lists",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "999",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("LINK","LINK_TITLE",""),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "ACTIVE_FROM",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "DESC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>
<div class="section best-sales-section">
	<div class="container">
		<div class="section-title">
			 Топ продаж
		</div>
		<div class="best-sales-row products-row flex-row">
		</div>

<?$APPLICATION->IncludeComponent("bitrix:catalog.top", "bootstrap_v6", Array(
	"ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
		"ADD_PROPERTIES_TO_BASKET" => "Y",	// Добавлять в корзину свойства товаров и предложений
		"ADD_TO_BASKET_ACTION" => "ADD",	// Показывать кнопку добавления в корзину или покупки
		"BASKET_URL" => "/personal/basket.php",	// URL, ведущий на страницу с корзиной покупателя
		"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"COMPARE_NAME" => "CATALOG_COMPARE_LIST",	// Уникальное имя для списка сравнения
		"COMPATIBLE_MODE" => "Y",	// Включить режим совместимости
		"CONVERT_CURRENCY" => "N",	// Показывать цены в одной валюте
		"DETAIL_URL" => "",	// URL, ведущий на страницу с содержимым элемента раздела
		"DISPLAY_COMPARE" => "N",	// Разрешить сравнение товаров
		"ELEMENT_COUNT" => "12",	// Количество выводимых элементов
		"ELEMENT_SORT_FIELD" => "sort",	// По какому полю сортируем элементы
		"ELEMENT_SORT_FIELD2" => "id",	// Поле для второй сортировки элементов
		"ELEMENT_SORT_ORDER" => "asc",	// Порядок сортировки элементов
		"ELEMENT_SORT_ORDER2" => "desc",	// Порядок второй сортировки элементов
		"ENLARGE_PRODUCT" => "STRICT",	// Выделять товары в списке
		"FILTER_NAME" => "",	// Имя массива со значениями фильтра для фильтрации элементов
		"HIDE_NOT_AVAILABLE" => "N",	// Недоступные товары
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",	// Недоступные торговые предложения
		"IBLOCK_ID" => "37",	// Инфоблок
		"IBLOCK_TYPE" => "1c_catalog",	// Тип инфоблока
		"LINE_ELEMENT_COUNT" => "3",	// Количество элементов выводимых в одной строке таблицы
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",	// Текст кнопки "Добавить в корзину"
		"MESS_BTN_BUY" => "Купить",	// Текст кнопки "Купить"
		"MESS_BTN_COMPARE" => "Сравнить",	// Текст кнопки "Сравнить"
		"MESS_BTN_DETAIL" => "Подробнее",	// Текст кнопки "Подробнее"
		"MESS_NOT_AVAILABLE" => "Нет в наличии",	// Сообщение об отсутствии товара
		"OFFERS_LIMIT" => "5",	// Максимальное количество предложений для показа (0 - все)
		"PARTIAL_PRODUCT_PROPERTIES" => "N",	// Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
		"PRICE_CODE" => "",	// Тип цены
		"PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",	// Порядок отображения блоков товара
		"PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
		"PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",	// Название переменной, в которой передается количество товара
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'6','BIG_DATA':false},{'VARIANT':'6','BIG_DATA':false}]",	// Вариант отображения товаров
		"PRODUCT_SUBSCRIPTION" => "Y",	// Разрешить оповещения для отсутствующих товаров
		"ROTATE_TIMER" => "30",
		"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
		"SEF_MODE" => "N",	// Включить поддержку ЧПУ
		"SHOW_CLOSE_POPUP" => "N",	// Показывать кнопку продолжения покупок во всплывающих окнах
		"SHOW_DISCOUNT_PERCENT" => "N",	// Показывать процент скидки
		"SHOW_MAX_QUANTITY" => "N",	// Показывать остаток товара
		"SHOW_OLD_PRICE" => "N",	// Показывать старую цену
		"SHOW_PAGINATION" => "Y",
		"SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
		"SHOW_SLIDER" => "Y",	// Показывать слайдер для товаров
		"SLIDER_INTERVAL" => "3000",	// Интервал смены слайдов, мс
		"SLIDER_PROGRESS" => "N",	// Показывать полосу прогресса
		"TEMPLATE_THEME" => "blue",	// Цветовая тема
		"USE_ENHANCED_ECOMMERCE" => "N",	// Отправлять данные электронной торговли в Google и Яндекс
		"USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
		"USE_PRODUCT_QUANTITY" => "N",	// Разрешить указание количества товара
		"VIEW_MODE" => "SECTION",	// Показ элементов
		"COMPONENT_TEMPLATE" => "bootstrap_v4",
		"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[{\"CLASS_ID\":\"CondIBProp:37:8992\",\"DATA\":{\"logic\":\"Equal\",\"value\":218}}]}",	// Фильтр товаров
		"OFFERS_SORT_FIELD" => "sort",	// По какому полю сортируем предложения товара
		"OFFERS_SORT_ORDER" => "asc",	// Порядок сортировки предложений товара
		"OFFERS_SORT_FIELD2" => "id",	// Поле для второй сортировки предложений товара
		"OFFERS_SORT_ORDER2" => "desc",	// Порядок второй сортировки предложений товара
		"OFFERS_FIELD_CODE" => array(	// Поля предложений
			0 => "",
			1 => "",
		),
		"PRODUCT_DISPLAY_MODE" => "N",	// Схема отображения
		"ADD_PICT_PROP" => "-",	// Дополнительная картинка основного товара
		"LABEL_PROP" => "",	// Свойство меток товара
	),
	false
);?>


	</div>
</div>
<div class="section home-promotions-section">
	<div class="container">
		<div class="section-title">
			 Акции
		</div>
		<div class="home-promotions-row promotions-row flex-row">
		</div>
	</div>
</div>
 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"articles.main",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("NAME","PREVIEW_TEXT","PREVIEW_PICTURE",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "2",
		"IBLOCK_TYPE" => "lists",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "999",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("VIEW_COUNTER",""),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "ACTIVE_FROM",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "DESC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>
<div class="section category-section">
	<div class="container">
		<div class="category-section-body">
			<div class="category-section-icon">
 <img src="/local/templates/main/assets/img/category-section-icon.svg" alt="">
			</div>
			<div class="category-section-content">
				<div class="category-section-title">
					 Товары для спорта и фитнеса
				</div>
				<div class="category-section-desc">
					 Позаботьтесь о себе и своих близких
				</div>
 <a href="#" class="category-section-btn btn btn-border btn-white">Все товары</a>
			</div>
		</div>
		<div class="category-section-products">
			<div class="category-section-products-slider swiper-container">
			</div>
		</div>
	</div>
</div>
<div class="section subscription-section hidden-mobile">
	<div class="container">
		<div class="subscription-section-desc">
			 Выгодные предложения для подписчиков. Вы будете одними из первых узнавать о новых скидках, акциях и распродажах. Подписаться.
		</div>
		<form action="?" class="subscription-section-form form">
 <label class="form-block" aria-label="Электронная почта"> <input type="email" class="input subscription-input" placeholder="Электронная почта" required=""> </label> <button type="submit" class="subscription-submit btn">Подписаться</button>
		</form>
	</div>
</div>
<div class="section novelty-section hidden-mobile">
	<div class="container">
		<div class="section-title">
			 Новинки
		</div>
		<div class="novelty-row products-row flex-row">
		</div>
	</div>
</div>
<div class="section seo-section">
	<div class="container">
		<div class="content-text">
			<p>
				 В интернет магазине «Гипермед» можно купить домашнюю медицинскую технику, расходные материалы и приборы для ухода за больными на дому, товары для стомы, восстановления после операции или травм, приспособления для пожилых пациентов, расходники для салонов красоты и косметологов.
			</p>
			<p>
				 Кроме широкого ассортимента изделий у нас низкие цены, удобная доставка по России и СНГ, самовывоз со склада в Москве и простые условия возврата и обмена. Магазин медицинских товаров в москве «Гипермед» предлагает только те медицинские изделия, которые прошли проверку качества, а также получили необходимые сертификаты.
			</p>
		</div>
	</div>
</div>
 </main><?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>