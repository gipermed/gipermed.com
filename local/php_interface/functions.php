<?php

use Bitrix\Main\Application;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Page\Asset;
use Palladiumlab\Management\User;
use Palladiumlab\Support\Bitrix\Bitrix;
use Palladiumlab\Support\Bitrix\Cache;
use Palladiumlab\Support\Bitrix\Resource;
use Palladiumlab\Support\System\Logger;
use Palladiumlab\Support\Util\Arr;
use Palladiumlab\Support\Util\Num;
use Palladiumlab\Support\Util\Str;

if (!function_exists('get_transliterate')) {
    function get_transliterate(string $value, array $options = [], string $lang = ''): string
    {
        return Bitrix::getTransliterate($value, $options, $lang);
    }
}

if (!function_exists('check_prolog')) {
    /**
     * Метод проверки подключения пролога сайта
     * Необходимо вызывать данный метод во всех шаблонах сайта (в начале файла)
     */
    function check_prolog()
    {
        if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
            die();
        }
    }
}

if (!function_exists('echo_when')) {
    /**
     * Метод выводит сообщение когда пользовательское условие выполняется
     *
     * @param $condition
     * @param string $message
     * @noinspection PhpUnnecessaryBoolCastInspection
     */
    function echo_when($condition, string $message)
    {
        if ((bool)$condition) {
            echo $message;
        }
    }
}

if (!function_exists('plural')) {
    function plural(int $number, $msg): string
    {
        return Str::pluralRussian($number, $msg);
    }
}

if (!function_exists('modules')) {
    function modules($modules): bool
    {
        return Bitrix::modules($modules);
    }
}

if (!function_exists('asset')) {
    function asset($resources = null): Asset
    {
        return Bitrix::asset($resources);
    }
}

if (!function_exists('class_list')) {
    function class_list(array $classes): string
    {
        return Str::classList($classes);
    }
}

if (!function_exists('logger')) {
    function logger(string $channelName, string $logFileName, int $logLevel = Logger::DEBUG): Logger
    {
        return Logger::make($channelName, $logFileName, $logLevel);
    }
}

if (!function_exists('debug_logger')) {
    function debug_logger(): Logger
    {
        return Logger::makeDebug();
    }
}

if (!function_exists('d')) {
    /**
     * Функция выводит удобный дамп переданных на вход переменных
     * с использованием компонента symfony/var-dumper
     *
     * Количество входных параметров не ограничено
     *
     * @see http://symfony.com/doc/current/components/var_dumper.html
     *
     * @param mixed ...$vars
     * @return void
     * @noinspection ForgottenDebugOutputInspection
     */
    function d(...$vars)
    {
        dump(...$vars);
    }
}

if (!function_exists('ddr')) {
    function ddr(...$vars)
    {
        restart_buffer();
        /** @noinspection ForgottenDebugOutputInspection */
        dd(...$vars);
    }
}

if (!function_exists('split_files')) {
    /**
     * Разбивает множественное поле типа файл, пришедшее в методе POST, на несколько
     * (для сохранения через функцию CFile::SaveFile).
     *
     * Возвращает итератор по массивам с полями каждого загруженного файла (name, type, tmp_name, error, size).
     *
     * <code>
     * foreach (splitFiles("ticketing_files") as $arFile) {
     *   $arProps["FILES"][] = $arFile;
     * }
     * \CIBlockElement::SetPropertyValuesEx(1, 2, $arProps);
     * </code>
     *
     * @param string $name Название поля в массиве $_FILES, которое будет разбито
     * @return Traversable
     */
    function split_files(string $name): Traversable
    {
        $arFileParam = $_FILES[$name];

        foreach ($arFileParam["name"] as $iIndex => $sName) {
            if (!$sName) {
                break;
            }

            yield [
                "name" => $arFileParam["name"][$iIndex],
                "type" => $arFileParam["type"][$iIndex],
                "tmp_name" => $arFileParam["tmp_name"][$iIndex],
                "error" => $arFileParam["error"][$iIndex],
                "size" => $arFileParam["size"][$iIndex],
            ];
        }
    }
}

if (!function_exists('full_url')) {
    /**
     * Полная ссылка: /link/ -> http://link/ или https://link/
     *
     * @param string url
     * @return string
     */
    function full_url($url): string
    {
        if (
            (isset($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] === 'https')
            || (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        ) {
            $protocol = 'https';
        } else {
            $protocol = 'http';
        }
        /** @noinspection PhpUndefinedConstantInspection */
        return $protocol . "://" . SITE_SERVER_NAME . $url;
    }
}

if (!function_exists('loc')) {
    /**
     * Обертка над \Bitrix\Main\Localization\Loc::getMessage()
     * @link https://dev.1c-bitrix.ru/api_d7/bitrix/main/localization/loc/getmessage.php
     * @return string
     */
    function loc(): string
    {
        return call_user_func_array([Loc::class, 'getMessage'], func_get_args());
    }
}

if (!function_exists('restart_buffer')) {
    function restart_buffer(): void
    {
        Bitrix::restartBuffer();
    }
}

if (!function_exists('format_thousand')) {
    function format_thousand(int $number): string
    {
        return Num::formatThousand($number);
    }
}

if (!function_exists('format_currency')) {
    function format_currency(float $number, $currency = 'RUB'): string
    {
        return Num::formatCurrency($number, $currency);
    }
}

if (!function_exists('cache')) {
    function cache(callable $callback, string $key, string $path, int $time = 60 * 60)
    {
        return (new Cache($key, $path, $time))->make($callback);
    }
}

if (!function_exists('clean_cache')) {
    function clean_cache(string $key, string $path): void
    {
        /** @noinspection NullPointerExceptionInspection */
        Application::getInstance()->getCache()->clean($key, $path);
    }
}

if (!function_exists('resource_generator')) {
    function resource_generator(CAllDBResult $resource): Generator
    {
        return (new Resource($resource))->toGenerator();
    }
}

if (!function_exists('resource_array')) {
    function resource_array(CAllDBResult $resource): array
    {
        return (new Resource($resource))->toArray();
    }
}

if (!function_exists('array_combine_keys')) {
    function array_combine_keys(array $array, string $key): array
    {
        return Arr::combineKeys($array, $key);
    }
}

if (!function_exists('parse_float')) {
    function parse_float($number): float
    {
        return Num::parseFloat($number);
    }
}

if (!function_exists('number_format_precision')) {
    function number_format_precision(float $number, int $precision = 2, string $separator = ','): string
    {
        return Num::formatPrecision($number, $precision, $separator);
    }
}

if (!function_exists('is_authorized')) {
    function is_authorized(): bool
    {
        return User::isAuthorized();
    }
}

if (!function_exists('include_content')) {
    function include_content(string $path): string
    {
        ob_start();

        global $APPLICATION;
        $APPLICATION->IncludeComponent("bitrix:main.include", "", [
            "AREA_FILE_SHOW" => "file",
            "PATH" => "/include{$path}"
        ], false, ['HIDE_ICONS' => 'Y']);

        return trim(ob_get_clean());
    }
}

if (!function_exists('include_content_phone')) {
    function include_content_phone(string $path): string
    {
        return Str::phone($path);
    }
}

if(!function_exists("pre")) {
    function pre($var, $die = false, $all = false)
    {
        global $USER;
        if ($USER->IsAdmin() || $all == true) {
            ?><?mb_internal_encoding('utf-8');?>

            <font style="text-align: left; font-size: 12px">
                <pre><? print_r($var) ?></pre>
            </font><br>
            <?
        }
        if ($die) {
            die;
        }
    }
}
if(!function_exists("endingsForm")) {
    function endingsForm($n, $form1, $form2, $form5)
    {
        $n = abs($n) % 100;
        $n1 = $n % 10;
        if ($n > 10 && $n < 20) return $form5;
        if ($n1 > 1 && $n1 < 5) return $form2;
        if ($n1 == 1) return $form1;
        return $form5;
    }
}
if(!function_exists("cut_string")) {
    function cut_string($string, $length)
    {
        if ($length && mb_strlen($string, 'UTF-8') > $length)
        {
            $str = strip_tags($string);
            $str = mb_substr($str, 0, $length, 'UTF-8');
            $pos = mb_strrpos($str, ' ', 'UTF-8');
            return mb_substr($str, 0, $pos, 'UTF-8').'…';
        }
        return $string;
    }
}
if(!function_exists("format_date")) {
    function format_date($date)
    {
        $_monthsList = array(
            "01" => "января",
            "02" => "февраля",
            "03" => "марта",
            "04" => "апреля",
            "05" => "мая",
            "06" => "июня",
            "07" => "июля",
            "08" => "августа",
            "09" => "сентября",
            "10" => "октября",
            "11" => "ноября",
            "12" => "декабря"
        );

        $explode = explode ('.',$date);
        $date_formated = $explode[0].' '.$_monthsList[$explode[1]].' '.$explode[2];
        return $date_formated;
    }
}
if(!function_exists("get_sale_product")) {
    function get_sale_product($saleId,$arrFilter = array(), $arSelect = array()){
        if(!CModule::IncludeModule('sale')) throw new SystemException('Не подключен модуль Sale');
        global $USER;
        $arUserGroups = $USER->GetUserGroupArray();
        if (!is_array($arUserGroups)) $arUserGroups = array($arUserGroups);
        // Достаем старым методом только ID скидок привязанных к группам пользователей по ограничениям
        $actionsNotTemp = \CSaleDiscount::GetList(array("ID" => "ASC"),array("USER_GROUPS" => $arUserGroups, 'ID' => $saleId),false,false,array("ID"));
        while($actionNot = $actionsNotTemp->fetch()){
            $actionIds[] = $actionNot['ID'];
        }
        $actionIds=array_unique($actionIds); sort($actionIds);
        // Подготавливаем необходимые переменные для разборчивости кода
        global $DB;
        $conditionLogic = array('Equal'=>'=','Not'=>'!','Great'=>'>','Less'=>'<','EqGr'=>'>=','EqLs'=>'<=');
        $arSelect = array_merge(array("ID","IBLOCK_ID","XML_ID"),$arSelect);
        // Теперь достаем новым методом скидки с условиями. P.S. Старым методом этого делать не нужно из-за очень высокой нагрузки (уже тестировал)
        $actions = \Bitrix\Sale\Internals\DiscountTable::getList(array(
            'select' => array("ID","ACTIONS_LIST",'CONDITIONS_LIST'),
            'filter' => array("ACTIVE"=>"Y","USE_COUPONS"=>"N","DISCOUNT_TYPE"=>"P","LID"=>SITE_ID,
                "ID"=>$actionIds,
                array(
                    "LOGIC" => "OR",
                    array(
                        "<=ACTIVE_FROM"=>$DB->FormatDate(date("Y-m-d H:i:s"),"YYYY-MM-DD HH:MI:SS",\CSite::GetDateFormat("FULL")),
                        ">=ACTIVE_TO"=>$DB->FormatDate(date("Y-m-d H:i:s"),"YYYY-MM-DD HH:MI:SS",\CSite::GetDateFormat("FULL"))
                    ),
                    array(
                        "=ACTIVE_FROM"=>false,
                        ">=ACTIVE_TO"=>$DB->FormatDate(date("Y-m-d H:i:s"),"YYYY-MM-DD HH:MI:SS",\CSite::GetDateFormat("FULL"))
                    ),
                    array(
                        "<=ACTIVE_FROM"=>$DB->FormatDate(date("Y-m-d H:i:s"),"YYYY-MM-DD HH:MI:SS",\CSite::GetDateFormat("FULL")),
                        "=ACTIVE_TO"=>false
                    ),
                    array(
                        "=ACTIVE_FROM"=>false,
                        "=ACTIVE_TO"=>false
                    ),
                ))
        ));
        // Перебираем каждую скидку и подготавливаем условия фильтрации для CIBlockElement::GetList
        while($arrAction = $actions->fetch()){
            $arrActions[$arrAction['ID']] = $arrAction;
        }

        foreach($arrActions as $actionId => $action){
            $arPredFilter = array_merge(array("ACTIVE_DATE"=>"Y", "CAN_BUY"=>"Y"),$arrFilter); //Набор предустановленных параметров
            $arFilter = $arPredFilter; //Основной фильтр
            $dopArFilter = $arPredFilter; //Фильтр для доп. запроса
            $dopArFilter["=XML_ID"] = array(); //Пустое значения для первой отработки array_merge
            //Магия генерации фильтра

            foreach($action['ACTIONS_LIST']['CHILDREN'] as $condition){
                foreach($condition['CHILDREN'] as $keyConditionSub=>$conditionSub){
                    $cs=$conditionSub['DATA']['value']; //Значение условия
                    $cls=$conditionLogic[$conditionSub['DATA']['logic']]; //Оператор условия
                    //$arFilter["LOGIC"]=$conditionSub['DATA']['All']?:'AND';
                    $CLASS_ID = explode(':',$conditionSub['CLASS_ID']);

                    if($CLASS_ID[0]=='ActSaleSubGrp') {
                        foreach($conditionSub['CHILDREN'] as $keyConditionSubElem=>$conditionSubElem){
                            $cse=$conditionSubElem['DATA']['value']; //Значение условия
                            $clse=$conditionLogic[$conditionSubElem['DATA']['logic']]; //Оператор условия
                            //$arFilter["LOGIC"]=$conditionSubElem['DATA']['All']?:'AND';
                            $CLASS_ID_EL = explode(':',$conditionSubElem['CLASS_ID']);

                            if($CLASS_ID_EL[0]=='CondIBProp') {
                                $arFilter["IBLOCK_ID"]=$CLASS_ID_EL[1];
                                $arFilter[$clse."PROPERTY_".$CLASS_ID_EL[2]]=array_merge((array)$arFilter[$clse."PROPERTY_".$CLASS_ID_EL[2]],(array)$cse);
                                $arFilter[$clse."PROPERTY_".$CLASS_ID_EL[2]]=array_unique($arFilter[$clse."PROPERTY_".$CLASS_ID_EL[2]]);
                            }elseif($CLASS_ID_EL[0]=='CondIBName') {
                                $arFilter[$clse."NAME"]=array_merge((array)$arFilter[$clse."NAME"],(array)$cse);
                                $arFilter[$clse."NAME"]=array_unique($arFilter[$clse."NAME"]);
                            }elseif($CLASS_ID_EL[0]=='CondIBElement') {
                                $arFilter[$clse."ID"]=array_merge((array)$arFilter[$clse."ID"],(array)$cse);
                                $arFilter[$clse."ID"]=array_unique($arFilter[$clse."ID"]);
                            }elseif($CLASS_ID_EL[0]=='CondIBTags') {
                                $arFilter[$clse."TAGS"]=array_merge((array)$arFilter[$clse."TAGS"],(array)$cse);
                                $arFilter[$clse."TAGS"]=array_unique($arFilter[$clse."TAGS"]);
                            }elseif($CLASS_ID_EL[0]=='CondIBSection') {
                                $arFilter[$clse."SECTION_ID"]=array_merge((array)$arFilter[$clse."SECTION_ID"],(array)$cse);
                                $arFilter[$clse."SECTION_ID"]=array_unique($arFilter[$clse."SECTION_ID"]);
                            }elseif($CLASS_ID_EL[0]=='CondIBXmlID') {
                                $arFilter[$clse."XML_ID"]=array_merge((array)$arFilter[$clse."XML_ID"],(array)$cse);
                                $arFilter[$clse."XML_ID"]=array_unique($arFilter[$clse."XML_ID"]);
                            }elseif($CLASS_ID_EL[0]=='CondBsktAppliedDiscount') { //Условие: Были применены скидки (Y/N)
                                foreach($arrActions as $tempAction){
                                    if(($tempAction['SORT']<$action['SORT']&&$tempAction['PRIORITY']>$action['PRIORITY']&&$cse=='N')||($tempAction['SORT']>$action['SORT']&&$tempAction['PRIORITY']<$action['PRIORITY']&&$cse=='Y')){
                                        $arFilter=false;
                                        break 4;
                                    }
                                }
                            }
                        }
                    }elseif($CLASS_ID[0]=='CondIBProp') {
                        $arFilter["IBLOCK_ID"]=$CLASS_ID[1];
                        $arFilter[$cls."PROPERTY_".$CLASS_ID[2]]=array_merge((array)$arFilter[$cls."PROPERTY_".$CLASS_ID[2]],(array)$cs);
                        $arFilter[$cls."PROPERTY_".$CLASS_ID[2]]=array_unique($arFilter[$cls."PROPERTY_".$CLASS_ID[2]]);
                    }elseif($CLASS_ID[0]=='CondIBName') {
                        $arFilter[$cls."NAME"]=array_merge((array)$arFilter[$cls."NAME"],(array)$cs);
                        $arFilter[$cls."NAME"]=array_unique($arFilter[$cls."NAME"]);
                    }elseif($CLASS_ID[0]=='CondIBElement') {
                        $arFilter[$cls."ID"]=array_merge((array)$arFilter[$cls."ID"],(array)$cs);
                        $arFilter[$cls."ID"]=array_unique($arFilter[$cls."ID"]);
                    }elseif($CLASS_ID[0]=='CondIBTags') {
                        $arFilter[$cls."TAGS"]=array_merge((array)$arFilter[$cls."TAGS"],(array)$cs);
                        $arFilter[$cls."TAGS"]=array_unique($arFilter[$cls."TAGS"]);
                    }elseif($CLASS_ID[0]=='CondIBSection') {
                        $arFilter[$cls."SECTION_ID"]=array_merge((array)$arFilter[$cls."SECTION_ID"],(array)$cs);
                        $arFilter[$cls."SECTION_ID"]=array_unique($arFilter[$cls."SECTION_ID"]);
                    }elseif($CLASS_ID[0]=='CondIBXmlID') {
                        $arFilter[$cls."XML_ID"]=array_merge((array)$arFilter[$cls."XML_ID"],(array)$cs);
                        $arFilter[$cls."XML_ID"]=array_unique($arFilter[$cls."XML_ID"]);
                    }elseif($CLASS_ID[0]=='CondBsktAppliedDiscount') { //Условие: Были применены скидки (Y/N)
                        foreach($arrActions as $tempAction){
                            if(($tempAction['SORT']<$action['SORT']&&$tempAction['PRIORITY']>$action['PRIORITY']&&$cs=='N')||($tempAction['SORT']>$action['SORT']&&$tempAction['PRIORITY']<$action['PRIORITY']&&$cs=='Y')){
                                $arFilter=false;
                                break 3;
                            }
                        }
                    }
                }
            }
            if($action['CONDITIONS_LIST']){
                foreach($action['CONDITIONS_LIST']['CHILDREN'] as $condition){
                    foreach($condition['CHILDREN'] as $keyConditionSub=>$conditionSub){
                        $cs=$conditionSub['DATA']['value']; //Значение условия
                        $cls=$conditionLogic[$conditionSub['DATA']['logic']]; //Оператор условия
                        //$arFilter["LOGIC"]=$conditionSub['DATA']['All']?:'AND';
                        $CLASS_ID = explode(':',$conditionSub['CLASS_ID']);

                        if($CLASS_ID[0]=='ActSaleSubGrp') {
                            foreach($conditionSub['CHILDREN'] as $keyConditionSubElem=>$conditionSubElem){
                                $cse=$conditionSubElem['DATA']['value']; //Значение условия
                                $clse=$conditionLogic[$conditionSubElem['DATA']['logic']]; //Оператор условия
                                //$arFilter["LOGIC"]=$conditionSubElem['DATA']['All']?:'AND';
                                $CLASS_ID_EL = explode(':',$conditionSubElem['CLASS_ID']);

                                if($CLASS_ID_EL[0]=='CondIBProp') {
                                    $arFilter["IBLOCK_ID"]=$CLASS_ID_EL[1];
                                    $arFilter[$clse."PROPERTY_".$CLASS_ID_EL[2]]=array_merge((array)$arFilter[$clse."PROPERTY_".$CLASS_ID_EL[2]],(array)$cse);
                                    $arFilter[$clse."PROPERTY_".$CLASS_ID_EL[2]]=array_unique($arFilter[$clse."PROPERTY_".$CLASS_ID_EL[2]]);
                                }elseif($CLASS_ID_EL[0]=='CondIBName') {
                                    $arFilter[$clse."NAME"]=array_merge((array)$arFilter[$clse."NAME"],(array)$cse);
                                    $arFilter[$clse."NAME"]=array_unique($arFilter[$clse."NAME"]);
                                }elseif($CLASS_ID_EL[0]=='CondIBElement') {
                                    $arFilter[$clse."ID"]=array_merge((array)$arFilter[$clse."ID"],(array)$cse);
                                    $arFilter[$clse."ID"]=array_unique($arFilter[$clse."ID"]);
                                }elseif($CLASS_ID_EL[0]=='CondIBTags') {
                                    $arFilter[$clse."TAGS"]=array_merge((array)$arFilter[$clse."TAGS"],(array)$cse);
                                    $arFilter[$clse."TAGS"]=array_unique($arFilter[$clse."TAGS"]);
                                }elseif($CLASS_ID_EL[0]=='CondIBSection') {
                                    $arFilter[$clse."SECTION_ID"]=array_merge((array)$arFilter[$clse."SECTION_ID"],(array)$cse);
                                    $arFilter[$clse."SECTION_ID"]=array_unique($arFilter[$clse."SECTION_ID"]);
                                }elseif($CLASS_ID_EL[0]=='CondIBXmlID') {
                                    $arFilter[$clse."XML_ID"]=array_merge((array)$arFilter[$clse."XML_ID"],(array)$cse);
                                    $arFilter[$clse."XML_ID"]=array_unique($arFilter[$clse."XML_ID"]);
                                }elseif($CLASS_ID_EL[0]=='CondBsktAppliedDiscount') { //Условие: Были применены скидки (Y/N)
                                    foreach($arrActions as $tempAction){
                                        if(($tempAction['SORT']<$action['SORT']&&$tempAction['PRIORITY']>$action['PRIORITY']&&$cse=='N')||($tempAction['SORT']>$action['SORT']&&$tempAction['PRIORITY']<$action['PRIORITY']&&$cse=='Y')){
                                            $arFilter=false;
                                            break 4;
                                        }
                                    }
                                }
                            }
                        }elseif($CLASS_ID[0]=='CondIBProp') {
                            $arFilter["IBLOCK_ID"]=$CLASS_ID[1];
                            $arFilter[$cls."PROPERTY_".$CLASS_ID[2]]=array_merge((array)$arFilter[$cls."PROPERTY_".$CLASS_ID[2]],(array)$cs);
                            $arFilter[$cls."PROPERTY_".$CLASS_ID[2]]=array_unique($arFilter[$cls."PROPERTY_".$CLASS_ID[2]]);
                        }elseif($CLASS_ID[0]=='CondIBName') {
                            $arFilter[$cls."NAME"]=array_merge((array)$arFilter[$cls."NAME"],(array)$cs);
                            $arFilter[$cls."NAME"]=array_unique($arFilter[$cls."NAME"]);
                        }elseif($CLASS_ID[0]=='CondIBElement') {
                            $arFilter[$cls."ID"]=array_merge((array)$arFilter[$cls."ID"],(array)$cs);
                            $arFilter[$cls."ID"]=array_unique($arFilter[$cls."ID"]);
                        }elseif($CLASS_ID[0]=='CondIBTags') {
                            $arFilter[$cls."TAGS"]=array_merge((array)$arFilter[$cls."TAGS"],(array)$cs);
                            $arFilter[$cls."TAGS"]=array_unique($arFilter[$cls."TAGS"]);
                        }elseif($CLASS_ID[0]=='CondIBSection') {
                            $arFilter[$cls."SECTION_ID"]=array_merge((array)$arFilter[$cls."SECTION_ID"],(array)$cs);
                            $arFilter[$cls."SECTION_ID"]=array_unique($arFilter[$cls."SECTION_ID"]);
                        }elseif($CLASS_ID[0]=='CondIBXmlID') {
                            $arFilter[$cls."XML_ID"]=array_merge((array)$arFilter[$cls."XML_ID"],(array)$cs);
                            $arFilter[$cls."XML_ID"]=array_unique($arFilter[$cls."XML_ID"]);
                        }elseif($CLASS_ID[0]=='CondBsktAppliedDiscount') { //Условие: Были применены скидки (Y/N)
                            foreach($arrActions as $tempAction){
                                if(($tempAction['SORT']<$action['SORT']&&$tempAction['PRIORITY']>$action['PRIORITY']&&$cs=='N')||($tempAction['SORT']>$action['SORT']&&$tempAction['PRIORITY']<$action['PRIORITY']&&$cs=='Y')){
                                    $arFilter=false;
                                    break 3;
                                }
                            }
                        }
                    }
                }
            }

            if($arFilter!==false&&$arFilter!=$arPredFilter){
                if(!isset($arFilter['=XML_ID'])){
                    //Делаем запрос по каждому из фильтров, т.к. один фильтр не получится сделать из-за противоречий условий каждой скидки
                    $res = \CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
                    while($ob = $res->GetNextElement()){
                        $arFields = $ob->GetFields();
                        $poductsArray['IDS'][] = $arFields["ID"];
                    }
                }elseif(!empty($arFilter['=XML_ID'])){
                    //Подготавливаем массив для отдельного запроса
                    $dopArFilter['=XML_ID'] = array_unique(array_merge($arFilter['=XML_ID'],$dopArFilter['=XML_ID']));
                }
            }
        }

        if(isset($dopArFilter)&&!empty($dopArFilter['=XML_ID'])){
            //Делаем отдельный запрос по конкретным XML_ID
            $res = \CIBlockElement::GetList(array(), $dopArFilter, false, array("nTopCount"=>count($dopArFilter['=XML_ID'])), $arSelect);
            while($ob = $res->GetNextElement()){
                $arFields = $ob->GetFields();
                $poductsArray['IDS'][] = $arFields["ID"];
            }
        }
        $poductsArray['IDS']=array_unique($poductsArray['IDS']);

        return $poductsArray;
    }
}
function getVideoCover($url)
{
    return preg_replace('/.*(:http|https|)(\?\/\/|)(?:www\.|)(?:youtube\.com|youtu\.be)(\?\/embed\/|\/v\/|\/watch\?v=|\/)(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*|[\w-]{10,12}).*/', 'http://img.youtube.com/vi/$4/maxresdefault.jpg', $url);
}





