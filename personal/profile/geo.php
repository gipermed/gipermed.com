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
 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog", 
	"catalog_new", 
	array(
		"COMPONENT_TEMPLATE" => "catalog_new",
		"IBLOCK_TYPE" => "1c_catalog",
		"IBLOCK_ID" => "55",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"TEMPLATE_THEME" => "green",
		"ADD_PICT_PROP" => "MORE_PHOTO",
		"LABEL_PROP" => array(
			0 => "IPRA",
			1 => "KHIT",
		),
		"PRODUCT_DISPLAY_MODE" => "N",
		"OFFER_ADD_PICT_PROP" => "MORE_PHOTO",
		"COMMON_SHOW_CLOSE_POPUP" => "Y",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"SHOW_DISCOUNT_PERCENT" => "Y",
		"SHOW_OLD_PRICE" => "Y",
		"SHOW_MAX_QUANTITY" => "N",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_ADD_TO_BASKET" => "Добавить в корзину",
		"MESS_BTN_COMPARE" => "Сравнение",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"SIDEBAR_SECTION_SHOW" => "Y",
		"SIDEBAR_DETAIL_SHOW" => "N",
		"SIDEBAR_PATH" => "",
		"USER_CONSENT" => "N",
		"USER_CONSENT_ID" => "0",
		"USER_CONSENT_IS_CHECKED" => "N",
		"USER_CONSENT_IS_LOADED" => "N",
		"SEF_MODE" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"USE_MAIN_ELEMENT_SECTION" => "Y",
		"DETAIL_STRICT_SECTION_CHECK" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_TITLE" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"ADD_ELEMENT_CHAIN" => "Y",
		"USE_SALE_BESTSELLERS" => "N",
		"USE_FILTER" => "Y",
		"FILTER_NAME" => "RAZMER",
		"FILTER_FIELD_CODE" => array(
			0 => "NAME",
			1 => "",
		),
		"FILTER_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_PRICE_CODE" => array(
			0 => "Договор эквайринга",
		),
		"FILTER_OFFERS_FIELD_CODE" => array(
			0 => "NAME",
			1 => "",
		),
		"FILTER_OFFERS_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_VIEW_MODE" => "VERTICAL",
		"FILTER_HIDE_ON_MOBILE" => "N",
		"INSTANT_RELOAD" => "N",
		"USE_REVIEW" => "Y",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"USE_COMPARE" => "N",
		"PRICE_CODE" => array(
			0 => "Договор эквайринга",
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"CONVERT_CURRENCY" => "N",
		"BASKET_URL" => "/cart/",
		"USE_PRODUCT_QUANTITY" => "Y",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "Y",
		"USE_COMMON_SETTINGS_BASKET_POPUP" => "Y",
		"COMMON_ADD_TO_BASKET_ACTION" => "ADD",
		"TOP_ADD_TO_BASKET_ACTION" => "ADD",
		"SECTION_ADD_TO_BASKET_ACTION" => "ADD",
		"DETAIL_ADD_TO_BASKET_ACTION" => array(
			0 => "BUY",
		),
		"SEARCH_PAGE_RESULT_COUNT" => "50",
		"SEARCH_RESTART" => "N",
		"SEARCH_NO_WORD_LOGIC" => "Y",
		"SEARCH_USE_LANGUAGE_GUESS" => "Y",
		"SEARCH_CHECK_DATES" => "Y",
		"SEARCH_USE_SEARCH_RESULT_ORDER" => "N",
		"SHOW_TOP_ELEMENTS" => "N",
		"SECTION_COUNT_ELEMENTS" => "Y",
		"SECTION_TOP_DEPTH" => "2",
		"SECTIONS_VIEW_MODE" => "LIST",
		"SECTIONS_SHOW_PARENT_NAME" => "Y",
		"PAGE_ELEMENT_COUNT" => "12",
		"LINE_ELEMENT_COUNT" => "3",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER2" => "desc",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LIST_META_KEYWORDS" => "-",
		"LIST_META_DESCRIPTION" => "-",
		"LIST_BROWSER_TITLE" => "-",
		"SECTION_BACKGROUND_IMAGE" => "-",
		"LIST_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_OFFERS_LIMIT" => "5",
		"LIST_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"LIST_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'6','BIG_DATA':false},{'VARIANT':'6','BIG_DATA':false}]",
		"LIST_ENLARGE_PRODUCT" => "STRICT",
		"LIST_SHOW_SLIDER" => "N",
		"DETAIL_META_KEYWORDS" => "-",
		"DETAIL_META_DESCRIPTION" => "-",
		"DETAIL_BROWSER_TITLE" => "-",
		"DETAIL_SET_CANONICAL_URL" => "N",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
		"DETAIL_BACKGROUND_IMAGE" => "-",
		"SHOW_DEACTIVATED" => "N",
		"SHOW_SKU_DESCRIPTION" => "Y",
		"DETAIL_OFFERS_FIELD_CODE" => array(
			0 => "DETAIL_TEXT",
			1 => "",
		),
		"DETAIL_MAIN_BLOCK_OFFERS_PROPERTY_CODE" => array(
			0 => "TSVET",
			1 => "RAZMER",
		),
		"DETAIL_USE_VOTE_RATING" => "N",
		"DETAIL_USE_COMMENTS" => "Y",
		"DETAIL_BRAND_USE" => "N",
		"DETAIL_DISPLAY_NAME" => "Y",
		"DETAIL_IMAGE_RESOLUTION" => "16by9",
		"DETAIL_PRODUCT_INFO_BLOCK_ORDER" => "props,sku",
		"DETAIL_PRODUCT_PAY_BLOCK_ORDER" => "rating,price,quantityLimit,priceRanges,quantity,buttons",
		"DETAIL_SHOW_SLIDER" => "N",
		"DETAIL_DETAIL_PICTURE_MODE" => array(
			0 => "POPUP",
		),
		"DETAIL_ADD_DETAIL_TO_SLIDER" => "Y",
		"DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "H",
		"MESS_PRICE_RANGES_TITLE" => "Цены",
		"MESS_DESCRIPTION_TAB" => "Описание",
		"MESS_PROPERTIES_TAB" => "Характеристики",
		"MESS_COMMENTS_TAB" => "Комментарии",
		"DETAIL_SHOW_POPULAR" => "N",
		"DETAIL_SHOW_VIEWED" => "N",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_IBLOCK_ID" => "",
		"LINK_PROPERTY_SID" => "",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"USE_GIFTS_DETAIL" => "N",
		"USE_GIFTS_SECTION" => "N",
		"USE_GIFTS_MAIN_PR_SECTION_LIST" => "N",
		"USE_STORE" => "Y",
		"STORES" => array(
			0 => "2",
			1 => "6",
			2 => "7",
			3 => "8",
			4 => "",
		),
		"USE_MIN_AMOUNT" => "Y",
		"USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"FIELDS" => array(
			0 => "",
			1 => "",
		),
		"MIN_AMOUNT" => "2",
		"SHOW_EMPTY_STORE" => "Y",
		"SHOW_GENERAL_STORE_INFORMATION" => "N",
		"STORE_PATH" => "/store/#store_id#",
		"MAIN_TITLE" => "Наличие на складах",
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER2" => "desc",
		"USE_BIG_DATA" => "N",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"LAZY_LOAD" => "N",
		"MESS_BTN_LAZY_LOAD" => "Показать ещё",
		"LOAD_ON_SCROLL" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"COMPATIBLE_MODE" => "Y",
		"USE_ELEMENT_COUNTER" => "Y",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DETAIL_SET_VIEWED_IN_COMPONENT" => "N",
		"LABEL_PROP_MOBILE" => array(
		),
		"LABEL_PROP_POSITION" => "top-left",
		"DISCOUNT_PERCENT_POSITION" => "top-right",
		"SEF_FOLDER" => "/personal/profile/",
		"DETAIL_BLOG_USE" => "Y",
		"DETAIL_VK_USE" => "N",
		"DETAIL_FB_USE" => "N",
		"DETAIL_BLOG_URL" => "catalog_comments",
		"DETAIL_BLOG_EMAIL_NOTIFY" => "N",
		"DETAIL_MAIN_BLOCK_PROPERTY_CODE" => array(
		),
		"MESSAGES_PER_PAGE" => "10",
		"USE_CAPTCHA" => "Y",
		"REVIEW_AJAX_POST" => "Y",
		"PATH_TO_SMILE" => "/bitrix/images/forum/smile/",
		"FORUM_ID" => "",
		"URL_TEMPLATES_READ" => "",
		"SHOW_LINK_TO_FORUM" => "Y",
		"SEF_URL_TEMPLATES" => array(
			"sections" => "",
			"section" => "#SECTION_CODE#/",
			"element" => "#SECTION_ID#/#ELEMENT_ID#/",
			"compare" => "compare.php?action=#ACTION_CODE#",
			"smart_filter" => "#SECTION_ID#/filter/#SMART_FILTER_PATH#/apply/",
		),
		"VARIABLE_ALIASES" => array(
			"compare" => array(
				"ACTION_CODE" => "action",
			),
		)
	),
	false
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