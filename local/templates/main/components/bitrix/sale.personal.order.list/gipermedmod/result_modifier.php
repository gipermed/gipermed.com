<?php

//use Palladiumlab\Basket\ProductLinkElement;

\Bitrix\Main\Loader::includeModule('iblock');
$productIds = [];
foreach ($arResult["ORDERS"] as $k => $order) {
    $db_props = CSaleOrderPropsValue::GetOrderProps($order['ORDER']['ID']);
    while ($arProps = $db_props->Fetch()) {
        $arResult['ORDERS'][$k]['PROPS'][$arProps['CODE']] = $arProps;
    }
    $statusIds[] = $order["ORDER"]['STATUS_ID'];
    $deliveryIds[] = $order["ORDER"]['DELIVERY_ID'];
	foreach ($order["BASKET_ITEMS"] as $basketItem) {
		$productIds[] = $basketItem['PRODUCT_ID'];
	}
}

CModule::IncludeModule('iblock');
$arFilter = Array("ID"=>$productIds, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), Array("ID", "NAME", "PREVIEW_PICTURE"));
while($ob = $res->Fetch()) {
    if($ob['PREVIEW_PICTURE']){
        $file = CFile::ResizeImageGet($ob['PREVIEW_PICTURE'], array('width'=>72, 'height'=>48), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $arResult['PHOTOS'][$ob['ID']] = $file['src'];
    }
}

if($statusIds){
    $res = CSaleStatus::GetList(Array('ID'=>'DESC'), array('ID'=>$statusIds,'LID'=>'ru'));
    while($ob = $res->Fetch()) {
        $arResult['STATUS_INFO'][$ob['ID']] = $ob;
    }
}
if($deliveryIds){
    $result = \Bitrix\Sale\Delivery\Services\Table::getList(array(
        'filter' => array('ACTIVE'=>'Y', 'ID'=>$deliveryIds),
    ));
    while($delivery=$result->fetch()) {
        $arResult['DELIVERY_NAME'][$delivery["ID"]] = $delivery;
    }
}
?>