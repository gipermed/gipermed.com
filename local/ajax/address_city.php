<?
if ($_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') die();
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
if($_REQUEST['term']):
    $res = \Bitrix\Sale\Location\LocationTable::getList(array(
        'filter' => array('>=TYPE.ID' => '3', '<=TYPE.ID' => '5', '=NAME.LANGUAGE_ID' => LANGUAGE_ID, '=PARENT.NAME.LANGUAGE_ID' => LANGUAGE_ID, 'NAME_RU' =>$_REQUEST['term'].'%'),
        'select' => array('ID','NAME_RU' => 'NAME.NAME','PARENT_NAME' => 'PARENT.NAME.NAME',)
    ));

    while ($item = $res->fetch()) {
        $arJSON['results'][] = array('id' => $item['ID'],'text' => $item['NAME_RU'].'('.$item['PARENT_NAME'].')');
    }
    echo json_encode($arJSON);
endif;
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_after.php"); ?>