<?php

use Bitrix\Main\EventManager;
use Palladiumlab\Events;

$eventManager = EventManager::getInstance();
//$eventManager->addEventHandler('search', 'BeforeIndex', [Events\SearchEvent::class, 'index']);
$eventManager->addEventHandler('iblock', 'OnBeforeIBlockElementAdd', [Events\Import1CEvent::class, 'BeforeUpdateAddHandler']);
$eventManager->addEventHandler('iblock', 'OnBeforeIBlockElementUpdate', [Events\Import1CEvent::class, 'BeforeUpdateAddHandler']);


AddEventHandler("search", "BeforeIndex", "BeforeIndexHandler");
function BeforeIndexHandler($arFields){
    if(!CModule::IncludeModule("iblock"))
        return $arFields;
    if($arFields["MODULE_ID"] == "iblock") {
        $db_props = CIBlockElement::GetProperty(
            $arFields["PARAM2"],
            $arFields["ITEM_ID"],
            array("sort" => "asc"),
            Array("CODE"=>"CML2_ARTICLE"));
        if($ar_props = $db_props->Fetch())
            $arFields["TITLE"] .= " ".$ar_props["VALUE"];
    }
    return $arFields;
}