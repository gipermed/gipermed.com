<?
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
if(!CModule::IncludeModule("highloadblock"))
    return;
GetList
?>

<?php
echo 'Данные приняты - '. $_POST['isMain'];

global $USER;

use Bitrix\Highloadblock as HL;

$hlbl = 3; // Указываем ID нашего highloadblock блока к которому будет делать запросы.
$hlblock = HL\HighloadBlockTable::getById($hlbl)->fetch();

$entity = HL\HighloadBlockTable::compileEntity($hlblock);
$entity_data_class = $entity->getDataClass();

// Массив полей для добавления
$data = array(
    "UF_TYPE_ADR"=>$_POST['tit'],
    "UF_CITY"=>$_POST['city'],
    "UF_COMENT"=>$_POST['comment'],
    "UF_MAINADR"=>$_POST['isMain'],
    "UF_KVARTIRA"=>$_POST['data'],
    "UF_STROENIE"=>$_POST['data'],
    "UF_KORPUS"=>$_POST['data'],
    "UF_HOME"=>$_POST['data'],
    "UF_STREET"=>$_POST['street'],
    "UF_ID_USER"=>$USER->GetID()
);
$result = $entity_data_class::add($data);
?>
