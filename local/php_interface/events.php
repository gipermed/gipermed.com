<?php

use Bitrix\Main\EventManager;
use Palladiumlab\Events;

$eventManager = EventManager::getInstance();
$eventManager->addEventHandler('search', 'BeforeIndex', [Events\SearchEvent::class, 'index']);
$eventManager->addEventHandler('iblock', 'OnBeforeIBlockElementAdd', [Events\Import1CEvent::class, 'BeforeUpdateAddHandler']);
$eventManager->addEventHandler('iblock', 'OnBeforeIBlockElementUpdate', [Events\Import1CEvent::class, 'BeforeUpdateAddHandler']);
