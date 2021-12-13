<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetTitle("");
$APPLICATION->SetPageProperty('title', 'Лист ожидания');

use Bitrix\Main\Loader;

Loader::includeModule("highloadblock");

use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;

if (!$USER->IsAuthorized())
{
	$_SESSION["BACKURL"] = $APPLICATION->GetCurPage();
	LocalRedirect("/auth/");
}
?><div class="cabinet cabinet-addresses">
	<div class="cabinet-section-title">
		 Мои адреса
	</div>
</div>
 <?php
    //$GLOBALS['CATALOG_CURRENT_ELEMENT_ID'] = $elementId;
    ?> &nbsp; <?$APPLICATION->IncludeComponent(
	"bitrix:catalog",
	"catalog_main",
	Array(
		"ACTION_VARIABLE" => "action",
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_PICT_PROP" => "MORE_PHOTO",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BASKET_URL" => "/cart/",
		"BIG_DATA_RCM_TYPE" => "personal",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMMON_ADD_TO_BASKET_ACTION" => "ADD",
		"COMMON_SHOW_CLOSE_POPUP" => "N",
		"COMPATIBLE_MODE" => "Y",
		"COMPONENT_TEMPLATE" => "catalog_main",
		"CONVERT_CURRENCY" => "N",
		"DETAIL_ADD_DETAIL_TO_SLIDER" => "Y",
		"DETAIL_ADD_TO_BASKET_ACTION" => array(0=>"ADD",),
		"DETAIL_ADD_TO_BASKET_ACTION_PRIMARY" => array(0=>"ADD",),
		"DETAIL_BACKGROUND_IMAGE" => "-",
		"DETAIL_BRAND_USE" => "N",
		"DETAIL_BROWSER_TITLE" => "-",
		"DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
		"DETAIL_DETAIL_PICTURE_MODE" => array(0=>"POPUP",),
		"DETAIL_DISPLAY_NAME" => "N",
		"DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "E",
		"DETAIL_IMAGE_RESOLUTION" => "16by9",
		"DETAIL_MAIN_BLOCK_OFFERS_PROPERTY_CODE" => array(0=>"TSVET",1=>"RAZMER",),
		"DETAIL_MAIN_BLOCK_PROPERTY_CODE" => array(),
		"DETAIL_META_DESCRIPTION" => "-",
		"DETAIL_META_KEYWORDS" => "-",
		"DETAIL_OFFERS_FIELD_CODE" => array(0=>"PREVIEW_TEXT",1=>"DETAIL_TEXT",2=>"",),
		"DETAIL_PRODUCT_INFO_BLOCK_ORDER" => "sku,props",
		"DETAIL_PRODUCT_PAY_BLOCK_ORDER" => "rating,price,priceRanges,quantity,quantityLimit,buttons",
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DETAIL_SET_VIEWED_IN_COMPONENT" => "N",
		"DETAIL_SHOW_POPULAR" => "N",
		"DETAIL_SHOW_SLIDER" => "Y",
		"DETAIL_SHOW_VIEWED" => "N",
		"DETAIL_SLIDER_INTERVAL" => "5000",
		"DETAIL_SLIDER_PROGRESS" => "N",
		"DETAIL_STRICT_SECTION_CHECK" => "N",
		"DETAIL_USE_COMMENTS" => "N",
		"DETAIL_USE_VOTE_RATING" => "N",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISCOUNT_PERCENT_POSITION" => "top-right",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"FIELDS" => array(0=>"",1=>"",),
		"FILTER_HIDE_ON_MOBILE" => "N",
		"FILTER_VIEW_MODE" => "VERTICAL",
		"GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",
		"GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
		"GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_MESS_BTN_BUY" => "Выбрать",
		"GIFTS_SECTION_LIST_BLOCK_TITLE" => "Подарки к товарам этого раздела",
		"GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_SECTION_LIST_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
		"GIFTS_SHOW_IMAGE" => "Y",
		"GIFTS_SHOW_NAME" => "Y",
		"GIFTS_SHOW_OLD_PRICE" => "Y",
		"HIDE_NOT_AVAILABLE" => "Y",
		"HIDE_NOT_AVAILABLE_OFFERS" => "Y",
		"IBLOCK_ID" => "55",
		"IBLOCK_TYPE" => "1c_catalog",
		"INCLUDE_SUBSECTIONS" => "Y",
		"INSTANT_RELOAD" => "N",
		"LABEL_PROP" => array(0=>"IPRA",1=>"KHIT",),
		"LABEL_PROP_MOBILE" => array(),
		"LABEL_PROP_POSITION" => "top-left",
		"LAZY_LOAD" => "N",
		"LINE_ELEMENT_COUNT" => "3",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"LINK_IBLOCK_ID" => "",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_PROPERTY_SID" => "",
		"LIST_BROWSER_TITLE" => "-",
		"LIST_ENLARGE_PRODUCT" => "STRICT",
		"LIST_META_DESCRIPTION" => "-",
		"LIST_META_KEYWORDS" => "-",
		"LIST_OFFERS_FIELD_CODE" => array(0=>"",1=>"",),
		"LIST_OFFERS_LIMIT" => "5",
		"LIST_PRODUCT_BLOCKS_ORDER" => "price,quantityLimit,props,sku,quantity,buttons",
		"LIST_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'6','BIG_DATA':false},{'VARIANT':'6','BIG_DATA':false}]",
		"LIST_SHOW_SLIDER" => "N",
		"LIST_SLIDER_INTERVAL" => "3000",
		"LIST_SLIDER_PROGRESS" => "N",
		"LOAD_ON_SCROLL" => "N",
		"MAIN_TITLE" => "Наличие на складах",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "Добавить в корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_COMPARE" => "Сравнение",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_LAZY_LOAD" => "Показать ещё",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_COMMENTS_TAB" => "Комментарии",
		"MESS_DESCRIPTION_TAB" => "Описание",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"MESS_PRICE_RANGES_TITLE" => "Цены",
		"MESS_PROPERTIES_TAB" => "Характеристики",
		"MESS_RELATIVE_QUANTITY_FEW" => "мало",
		"MESS_RELATIVE_QUANTITY_MANY" => "много",
		"MESS_SHOW_MAX_QUANTITY" => "Наличие",
		"MIN_AMOUNT" => "3",
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_ORDER2" => "desc",
		"OFFER_ADD_PICT_PROP" => "MORE_PHOTO",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "12",
		"PARTIAL_PRODUCT_PROPERTIES" => "Y",
		"PRICE_CODE" => array(0=>"Договор эквайринга",),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"PRODUCT_DISPLAY_MODE" => "N",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"RELATIVE_QUANTITY_FACTOR" => "5",
		"SEARCH_CHECK_DATES" => "Y",
		"SEARCH_NO_WORD_LOGIC" => "Y",
		"SEARCH_PAGE_RESULT_COUNT" => "50",
		"SEARCH_RESTART" => "N",
		"SEARCH_USE_LANGUAGE_GUESS" => "Y",
		"SEARCH_USE_SEARCH_RESULT_ORDER" => "N",
		"SECTIONS_SHOW_PARENT_NAME" => "Y",
		"SECTIONS_VIEW_MODE" => "LIST",
		"SECTION_ADD_TO_BASKET_ACTION" => "ADD",
		"SECTION_BACKGROUND_IMAGE" => "-",
		"SECTION_COUNT_ELEMENTS" => "Y",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_TOP_DEPTH" => "2",
		"SEF_MODE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SHOW_DEACTIVATED" => "N",
		"SHOW_DISCOUNT_PERCENT" => "Y",
		"SHOW_EMPTY_STORE" => "Y",
		"SHOW_GENERAL_STORE_INFORMATION" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_OLD_PRICE" => "Y",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_SKU_DESCRIPTION" => "Y",
		"SHOW_TOP_ELEMENTS" => "N",
		"SIDEBAR_DETAIL_POSITION" => "right",
		"SIDEBAR_DETAIL_SHOW" => "N",
		"SIDEBAR_PATH" => "",
		"SIDEBAR_SECTION_POSITION" => "right",
		"SIDEBAR_SECTION_SHOW" => "N",
		"STORES" => array(0=>"2",1=>"6",2=>"7",3=>"8",4=>"",),
		"STORE_PATH" => "/store/#store_id#",
		"TEMPLATE_THEME" => "green",
		"TOP_ADD_TO_BASKET_ACTION" => "ADD",
		"TOP_ELEMENT_COUNT" => "9",
		"TOP_ELEMENT_SORT_FIELD" => "sort",
		"TOP_ELEMENT_SORT_FIELD2" => "id",
		"TOP_ELEMENT_SORT_ORDER" => "asc",
		"TOP_ELEMENT_SORT_ORDER2" => "desc",
		"TOP_ENLARGE_PRODUCT" => "STRICT",
		"TOP_LINE_ELEMENT_COUNT" => "3",
		"TOP_OFFERS_FIELD_CODE" => array(0=>"",1=>"",),
		"TOP_OFFERS_LIMIT" => "5",
		"TOP_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"TOP_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"TOP_SHOW_SLIDER" => "Y",
		"TOP_SLIDER_INTERVAL" => "3000",
		"TOP_SLIDER_PROGRESS" => "N",
		"TOP_VIEW_MODE" => "SECTION",
		"USER_CONSENT" => "N",
		"USER_CONSENT_ID" => "0",
		"USER_CONSENT_IS_CHECKED" => "Y",
		"USER_CONSENT_IS_LOADED" => "N",
		"USER_FIELDS" => array(0=>"",1=>"",),
		"USE_BIG_DATA" => "N",
		"USE_COMMON_SETTINGS_BASKET_POPUP" => "Y",
		"USE_COMPARE" => "N",
		"USE_ELEMENT_COUNTER" => "Y",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_FILTER" => "N",
		"USE_GIFTS_DETAIL" => "N",
		"USE_GIFTS_MAIN_PR_SECTION_LIST" => "N",
		"USE_GIFTS_SECTION" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_MIN_AMOUNT" => "Y",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "Y",
		"USE_REVIEW" => "N",
		"USE_SALE_BESTSELLERS" => "N",
		"USE_STORE" => "Y",
		"VARIABLE_ALIASES" => array("ELEMENT_ID"=>"ELEMENT_ID","SECTION_ID"=>"SECTION_ID",)
	)
);?><script>
/*var r = sessionStorage.getItem('a');
if (r == "Москва" || r == "Москва и Московская область") {
  window.location.href = '/sale/';
}*/
</script> <a href="#modal-city" class="head-city-link modal-open-btn"> <span><span class="hidden-desktop">Ваш регион доставки:</span> <b><span id="user-regionr"> </span></b></span> </a>
<?php
    $hlbl = 3; // Указываем ID нашего highloadblock блока к которому будет делать запросы.
    $hlblock = HL\HighloadBlockTable::getById($hlbl)->fetch();

    $entity = HL\HighloadBlockTable::compileEntity($hlblock);
    $entity_data_class = $entity->getDataClass();

    $rsData = $entity_data_class::getList(array(
    "select" => array("*"),
    "order" => array("ID" => "ASC"),
    "filter" => array("UF_ID_USER"=>$USER->GetID())  // Задаем параметры фильтра выборки
    ));
    ?>
<div class="cabinet-profile-form-row1 flex-row" style="margin: 30px">
	 <?
while($arData = $rsData->Fetch()){
    ?>
	<div class="cabinet-profile-form-col-maintel flex-row-item delnew " style="width: 30%">
		<div class="cabinet-profile-form-row flex-row">
			<div class="cabinet-profile-form-col-mainp1 flex-row-item" style="width: 50%">
 <label class="form-block"> <a href="#modal-delAdr" class=" modal-open-btn cabinet-address-item-editnew"> <span style="font-size: 18px; font-weight: 600; color: #4365AF; text-align: left; margin-bottom: 10px"><?=$arData['UF_TYPE_ADR']; ?></span> &nbsp; <img src="/local/templates/main/assets/img/delAdr.jpg" alt=""><b><span id="user-region"> </span></b></a> </label>
			</div>
			<div class="cabinet-profile-form-col-mainp2 flex-row-item" style="width: 50%">
 <label class="form-block"> <a href="#" class="cabinet-address-item-delnew"> <span class="form-block-title" style="font-size: 15px; font-weight: 500; color: #545454; text-align: right; margin-bottom: 10px">Удалить адрес</span></a> </label>
			</div>
		</div>
 <input type="hidden" class="input cabinet-address-input-id" value="<?=$arData['ID']; ?>"> <input type="hidden" class="input cabinet-address-input-typeadr" value="<?=$arData['UF_TYPE_ADR']; ?>"> <input type="hidden" class="input cabinet-address-input-cityn" value="<?=$arData['UF_CITY']; ?>"> <input type="hidden" class="input cabinet-address-input-street" value="<?=$arData['UF_STREET']; ?>"> <input type="hidden" class="input cabinet-address-input-home" value="<?=$arData['UF_HOME']; ?>"> <input type="hidden" class="input cabinet-address-input-korpus" value="<?=$arData['UF_KORPUS']; ?>"> <input type="hidden" class="input cabinet-address-input-stroenie" value="<?=$arData['UF_STROENIE']; ?>"> <input type="hidden" class="input cabinet-address-input-kvartira" value="<?=$arData['UF_KVARTIRA']; ?>"> <input type="hidden" class="input cabinet-address-input-coment" value="<?=$arData['UF_COMENT']; ?>">
		<div style="font-size: 13px; font-weight: 500; text-align: left; margin-bottom: 5px">
			 Адрес доставки:
		</div>
		<div style="font-size: 13px; font-weight: 400; text-align: left; margin-bottom: 25px">
			 Нас. пункт: <?=$arData['UF_CITY']; ?>, ул.<?=$arData['UF_STREET']; ?>, дом: <?=$arData['UF_HOME']; ?>, корп. <?=$arData['UF_KORPUS']; ?>, стр. <?=$arData['UF_STROENIE']; ?>, кв. <?=$arData['UF_KVARTIRA']; ?>
		</div>
		<div style="font-size: 13px; font-weight: 500; text-align: left; margin-bottom: 5px">
			 Коментарий курьеру:
		</div>
		<div style="font-size: 13px; font-weight: 400; text-align: left; margin-bottom: 25px">
			 <?=$arData['UF_COMENT']; ?>
		</div>
	</div>
	 <?php
}
?>
</div>
<div class="cabinet cabinet-addresses1">
	<div class="cabinet-address-add">
 <a href="#" class="cabinet-address-add-btn">
		Новый адрес </a>
	</div>
	<div class="cabinet-address-new">
		<form action="?" class="cabinet-address-form form">
			<div class="cabinet-address-form-inputs">
				<div class="cabinet-address-form-row flex-row">
					<div class="cabinet-address-form-col flex-row-item">
 <label class="form-block"> <span class="form-block-title">Название адреса (напр. Работа)</span> <input type="text" class="input cabinet-address-input-title" required=""> </label>
					</div>
					<div class="cabinet-address-form-col flex-row-item">
						<div class="form-block">
 <span class="form-block-title">Населённый пункт</span>
							<div id="one_string" class="form-block-select ordering-delivery-city-select">
 <input name="address" type="search" class="input cabinet-address-input-city" required="">
							</div>
						</div>
					</div>
					<div class="cabinet-address-form-col flex-row-item">
 <label class="form-block"> <span class="form-block-title">Улица</span> <input type="text" class="input cabinet-address-input-data" required=""> </label>
					</div>
				</div>
			</div>
			<div class="cabinet-address-form-inputs cabinet-address-form-inputs-small">
				<div class="cabinet-address-form-row flex-row">
					<div class="cabinet-address-form-col flex-row-item">
 <label class="form-block"> <span class="form-block-title">Дом</span> <input type="text" class="input cabinet-address-input-data" required=""> </label>
					</div>
					<div class="cabinet-address-form-col flex-row-item">
 <label class="form-block"> <span class="form-block-title">Корпус</span> <input type="text" class="input cabinet-address-input-data"> </label>
					</div>
					<div class="cabinet-address-form-col flex-row-item">
 <label class="form-block"> <span class="form-block-title">Строение</span> <input type="text" class="input cabinet-address-input-data"> </label>
					</div>
					<div class="cabinet-address-form-col flex-row-item">
 <label class="form-block"> <span class="form-block-title">Квартира</span> <input type="text" class="input cabinet-address-input-data"> </label>
					</div>
				</div>
			</div>
 <label class="form-block"> <span class="form-block-title">Комментарий курьеру:</span> <textarea class="input textarea cabinet-address-input-comment" placeholder="Напишите ваш комментарий"></textarea> </label>
			<div class="cabinet-address-form-submit-wrapp submit-wrapp">
 <label class="checkbox-label cabinet-address-form-main-checkbox"> </label>
				<ul class="cabinet-address-form-btns">
					<li> <button class="btn btn-full btn-green submit">
					Сохранить </button> </li>
					<li> <a href="#" class="btn btn-full cabinet-address-form-del">Отменить</a> </li>
				</ul>
			</div>
		</form>
	</div>
	<div class="cabinet-address-list">
	</div>
</div>
 <br><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>