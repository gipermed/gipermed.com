<?php
/** @var \Redis $redisConnection **/
$redisConnection = \Bitrix\Main\Application::getConnection('custom.redis')->getResource();
$redisConnection->setnx('foo', 'bar');

