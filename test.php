<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Gipermed");

setcookie("prymery.geoip.2.8.1_city_id", "", time()-3600);
setcookie("prymery_geoip_2_8_1_city_id", "", time()-3600);
setcookie("prymery.geoip.2.8.1_location", "", time()-3600);

//setcookie('prymery.geoip.2.8.1_city_id',133866, time()+(86400*30));
//setcookie('prymery.geoip.2.8.1_location',133866, time()+(86400*30));

pre($APPLICATION->get_cookie('prymery_geoip_2_8_1_city_id'));
pre($_COOKIE);
?>
<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>