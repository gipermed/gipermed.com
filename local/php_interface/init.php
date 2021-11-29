<?php

use Bitrix\Sale\Registry;
use Dotenv\Dotenv;
use Palladiumlab\Bitrix\Sale;

require_once dirname(__DIR__) . '/vendor/autoload.php';

/** Подключение файла глобальных методов (функций) */
require_once __DIR__ . '/functions.php';
/** Подключение файла событий */
require_once __DIR__ . '/events.php';

/** Подключение файла констант (генерируемый файл) */
if (file_exists(__DIR__ . '/const.php') && is_readable(__DIR__ . '/const.php')) {
    require_once __DIR__ . '/const.php';
}

/** Загрузка файла /.env с переменными окружения */
Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT'])->safeLoad();

if (!defined('ROOT_PATH')) {
    /** Document root */
    define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT']);
}

if (!defined('CATALOG_ID')) {
    /** Идентификатор каталога, используемого на всём сайте */
    define('CATALOG_ID', IBLOCK_CATALOG_ID);
}

if (!defined('SITE_TEMPLATE_PATH')) {
    /** Идентификатор каталога, используемого на всём сайте */
    define('SITE_TEMPLATE_PATH', '/local/templates/main/');
}

/** Подключение модуля iblock */
modules(['iblock', 'sale']);

Registry::getInstance(Sale\Order::getRegistryType())->set(Sale\Order::getRegistryEntity(), Sale\Order::class);
Registry::getInstance(Sale\PropertyValue::getRegistryType())->set(Sale\PropertyValue::getRegistryEntity(), Sale\PropertyValue::class);
Registry::getInstance(Sale\BasketItem::getRegistryType())->set(Sale\BasketItem::getRegistryEntity(), Sale\BasketItem::class);
