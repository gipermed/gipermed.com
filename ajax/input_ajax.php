<?
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
if(!CModule::IncludeModule("highloadblock"))
    return;
GetList
?>

<?php
//echo 'Данные приняты - '. $_POST['arr'];

//echo '<pre>';
//print_r($_POST['arr']);
//echo '</pre>';

global $USER;

use Bitrix\Highloadblock as HL;

$hlbl = 3; // Указываем ID нашего highloadblock блока к которому будет делать запросы.
$hlblock = HL\HighloadBlockTable::getById($hlbl)->fetch();

$entity = HL\HighloadBlockTable::compileEntity($hlblock);
$entity_data_class = $entity->getDataClass();

if($_POST['action'] == "del")
    $entity_data_class::Delete($_POST['arr']);

if($_POST['action'] == "new") {

// Массив полей для добавления
    $data = array(
        "UF_CODE" => $_POST['arr'][0],
        "UF_INDEX" => $_POST['arr'][1],
        "UF_REGION" => $_POST['arr'][2],
        "UF_TYPE_ADR" => $_POST['arr'][3],
        "UF_CITY" => $_POST['arr'][4],
        "UF_COMENT" => $_POST['arr'][5],
        "UF_MAINADR" => $_POST['arr'][6],
        "UF_KVARTIRA" => $_POST['arr'][11],
        "UF_STROENIE" => $_POST['arr'][10],
        "UF_KORPUS" => $_POST['arr'][9],
        "UF_HOME" => $_POST['arr'][8],
        "UF_STREET" => $_POST['arr'][7],
        "UF_ID_USER" => $USER->GetID()
    );
    $result = $entity_data_class::add($data);

    //echo(print_r($_POST['arr'][1]));
}

if($_POST['action'] == "edit") {
// Массив полей для обновления
    $data = array(
        "UF_TYPE_ADR" => $_POST['arr'][0],
        "UF_CITY" => $_POST['arr'][8],
        "UF_COMENT" => $_POST['arr'][1],
        "UF_MAINADR" => $_POST['arr'][2],
        "UF_KVARTIRA" => $_POST['arr'][3],
        "UF_STROENIE" => $_POST['arr'][4],
        "UF_KORPUS" => $_POST['arr'][6],
        "UF_HOME" => $_POST['arr'][7],
        "UF_STREET" => $_POST['arr'][5],
        "UF_ID_USER" => $USER->GetID()
    );
    $result = $entity_data_class::update($_POST['arr'][9], $data);
}
?>
