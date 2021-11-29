<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetTitle("");
$APPLICATION->SetPageProperty('title', 'Лист ожидания');

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

<script>
var r = sessionStorage.getItem('a');
if (r == "Москва" || r == "Москва и Московская область") {
  window.location.href = '/sale/';
}
</script>
<a href="#modal-city" class="head-city-link modal-open-btn">
                        <svg width="24" height="24">
                            <use xlink:href="#icon-cursor"/>
                        </svg>
                        <span><span class="hidden-desktop">Ваш регион доставки:</span> <b><span id="user-regionr"> </span></b></span>
                    </a>


  










<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>