<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Новая страница");
?><?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket",
	"gipermed",
	Array(
		"ACTION_VARIABLE" => "basketAction",
		"ADDITIONAL_PICT_PROP_28" => "-",
		"ADDITIONAL_PICT_PROP_29" => "-",
		"ADDITIONAL_PICT_PROP_30" => "-",
		"ADDITIONAL_PICT_PROP_31" => "-",
		"ADDITIONAL_PICT_PROP_37" => "-",
		"ADDITIONAL_PICT_PROP_38" => "-",
		"AUTO_CALCULATION" => "Y",
		"BASKET_IMAGES_SCALING" => "standard",
		"COLUMNS_LIST_EXT" => array("PREVIEW_PICTURE","DISCOUNT","DELETE"),
		"COLUMNS_LIST_MOBILE" => array("PREVIEW_PICTURE","DISCOUNT","DELETE"),
		"COMPATIBLE_MODE" => "N",
		"CORRECT_RATIO"                   => "Y",
		"DEFERRED_REFRESH"                => "N",
		"DISCOUNT_PERCENT_POSITION"       => "bottom-right",
		"DISPLAY_MODE"                    => "extended",
		"EMPTY_BASKET_HINT_PATH"          => "/",
		"GIFTS_BLOCK_TITLE"               => "Выберите один из подарков",
		"GIFTS_CONVERT_CURRENCY"          => "N",
		"GIFTS_HIDE_BLOCK_TITLE"          => "N",
		"GIFTS_HIDE_NOT_AVAILABLE"        => "N",
		"GIFTS_MESS_BTN_BUY"              => "Выбрать",
		"GIFTS_MESS_BTN_DETAIL"           => "Подробнее",
		"GIFTS_PAGE_ELEMENT_COUNT"        => "4",
		"GIFTS_PLACE"                     => "BOTTOM",
		"GIFTS_PRODUCT_PROPS_VARIABLE"    => "prop",
		"GIFTS_PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"GIFTS_SHOW_DISCOUNT_PERCENT"     => "Y",
		"GIFTS_SHOW_OLD_PRICE"            => "N",
		"GIFTS_TEXT_LABEL_GIFT"           => "Подарок",
		"HIDE_COUPON"                     => "N",
		"LABEL_PROP"                      => array(),
		"PATH_TO_ORDER"                   => "/sale/",
		"PRICE_DISPLAY_MODE"              => "Y",
		"PRICE_VAT_SHOW_VALUE"            => "N",
		"PRODUCT_BLOCKS_ORDER"            => "props,sku,columns",
		"QUANTITY_FLOAT"                  => "Y",
		"SET_TITLE"                       => "Y",
		"SHOW_DISCOUNT_PERCENT"           => "Y",
		"SHOW_FILTER"                     => "N",
		"SHOW_RESTORE"                    => "N",
		"TEMPLATE_THEME"                  => "site",
		"TOTAL_BLOCK_DISPLAY"             => array(),
		"USE_DYNAMIC_SCROLL"              => "Y",
		"USE_ENHANCED_ECOMMERCE"          => "N",
		"USE_GIFTS"                       => "N",
		"USE_PREPAYMENT"                  => "N",
		"USE_PRICE_ANIMATION"             => "N"
	)
);?><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>