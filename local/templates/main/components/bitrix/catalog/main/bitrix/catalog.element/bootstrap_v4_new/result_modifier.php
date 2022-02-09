<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();
//foreach ($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $key=>$photo)
//{
//	$fileImg=CFile::GetFileArray($photo);
//	$arImg = CFile::ResizeImageGet(
//		$photo,
//		array('width' => $fileImg['WIDTH']*2, 'height'=>$fileImg['HEIGHT']*2),
//		BX_RESIZE_IMAGE_PROPORTIONAL_ALT,
//		true
//	);
//	$arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE2X"][$key]=$arImg;
//}

if($arResult['PROPERTIES']['FILES']['VALUE']){
    foreach($arResult['PROPERTIES']['FILES']['VALUE'] as $key=>$file){
        $arFile = CFile::GetFileArray($file);
        $arResult['FILES'][] = array(
            'SRC' => CFile::GetPath($file),
            'NAME' => $arResult['PROPERTIES']['FILES']['DESCRIPTION'][$key],
            'FILE_SIZE' => CFile::FormatSize($arFile['FILE_SIZE'])
        );
    }
}

global $APPLICATION;
$cp = $this->__component;
if (is_object($cp)) {
    $cp->arResult['ID'] = $arResult["ID"];
    $cp->SetResultCacheKeys(array('ID'));
}


//if($arResult['OFFERS']){
//    $price = $arResult['OFFERS'][0]['ITEM_PRICES'][0]['PRICE'];
//}else{
//    $price = $arResult['ITEM_PRICES'][0]['PRICE'];
//}
//
//if($price){
//    $arDeliveriesCurrent = getHomeDeliveryByLocationAndPriceRestriction('0000550426',$price,getLocationToDeliveryEntity());
//    //Если служба доставки автоматизированная (создана сторонним обработчиком), то посчитаем стоимость доставки иначе.
//    if($arDeliveriesCurrent){
//        foreach($arDeliveriesCurrent as $key=>$delivery){
//            if($delivery['CONFIG']['MAIN']['PROFILE_ID']){
//                $arDeliveriesCurrent[$key]['PRICE'] = getDeliveries($arResult["ID"],$price,$delivery['ID']);
//            }
//        }
//    }
//}


//pre($arDeliveriesCurrent);

?>