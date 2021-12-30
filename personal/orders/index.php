<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetPageProperty('title', 'Мои заказы');

if (!$USER->IsAuthorized())
{
	$_SESSION["BACKURL"] = $APPLICATION->GetCurPage();
	LocalRedirect("/auth/");
}
?>



<? $APPLICATION->IncludeComponent("bitrix:sale.personal.order.list", "gipermedmod", //		"",
	array(
		"STATUS_COLOR_N"                => "green",
		"STATUS_COLOR_P"                => "yellow",
		"STATUS_COLOR_F"                => "gray",
		"STATUS_COLOR_PSEUDO_CANCELLED" => "red",
		"PATH_TO_DETAIL"                => "detail.php?ID=#ID#",
		"PATH_TO_COPY"                  => "index.php",
		"PATH_TO_CANCEL"                => "cancel_order.php?ID=#ID#",
		"PATH_TO_BASKET"                => "/cart/",
		"PATH_TO_PAYMENT"               => "payment.php",
		"ORDERS_PER_PAGE"               => 2000,
		"ID"                            => $_REQUEST["ID"],
		"SET_TITLE"                     => "Y",
		"SAVE_IN_SESSION"               => "Y",
		"NAV_TEMPLATE"                  => "",
		"CACHE_TYPE"                    => "A",
		"CACHE_TIME"                    => "3600",
		"CACHE_GROUPS"                  => "Y",
		"HISTORIC_STATUSES"             => "F",
		"ACTIVE_DATE_FORMAT"            => "d.m.Y"
	)); ?>




<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
?>
