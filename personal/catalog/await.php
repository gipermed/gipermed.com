<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetPageProperty('title', 'Лист ожидания');

if (!$USER->IsAuthorized())
{
	$_SESSION["BACKURL"] = $APPLICATION->GetCurPage();
	LocalRedirect("/auth/");
}
?>
 <div class="cabinet cabinet-products">
        <div class="cabinet-section-title">
            Лист ожидания
        </div>
   
	 <?/* $APPLICATION->IncludeComponent("bitrix:sale.personal.subscribe.list", "", array(
		"PATH_TO_CANCEL" => "cancel_subscribe.php?ID=#ID#",
		"PER_PAGE"       => 20,
		"SET_TITLE"      => "Y"
)); */?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>