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
