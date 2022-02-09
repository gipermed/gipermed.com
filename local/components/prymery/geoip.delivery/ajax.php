<?
    /** @global \CMain $APPLICATION */

    define("NOT_CHECK_PERMISSIONS", true);
    define("STOP_STATISTICS", true);
    define("NO_KEEP_STATISTIC", "Y");
    define("NO_AGENT_STATISTIC", "Y");
    define("DisableEventsCheck", true);
    // define('BX_SECURITY_SESSION_READONLY', true);
    define("PUBLIC_AJAX_MODE", true);


    $siteId = isset($_REQUEST['siteId']) && is_string($_REQUEST['siteId']) ? $_REQUEST['siteId'] : '';
    $siteId = substr(preg_replace('/[^a-z0-9_]/i', '', $siteId), 0, 2);
    if (!empty($siteId) && is_string($siteId)) {
        define('SITE_ID', $siteId);
    }

    require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

    $request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
    $request->addFilter(new \Bitrix\Main\Web\PostDecodeFilter);

    $signer = new \Bitrix\Main\Security\Sign\Signer;

    try {
        $template = $signer->unsign($request->get('template'), 'prymery.geoip.delivery');
        $paramString = $signer->unsign($request->get('parameters'), 'prymery.geoip.delivery');
    } catch (\Bitrix\Main\Security\Sign\BadSignatureException $e) {
        die();
    }

    if (!\Bitrix\Main\Loader::includeModule('prymery.geoip')) {
        die();
    }

    $oManager = \Prymery\GeoIP\Manager::getInstance();

    $parameters = unserialize(base64_decode($paramString));
    $parameters['IS_AJAX'] = 'Y';
    $parameters['LOCATION'] = (!is_null($request->get('location')) && intval($request->get('location')) ? intval($request->get('location')) : $oManager->getLocation());

    if (!is_null($request->get('productId')) && intval($request->get('productId'))) {
        $parameters['PRODUCT'] = intval($request->get('productId'));
    }

    $APPLICATION->IncludeComponent('prymery:geoip.delivery', $template, $parameters, false);


    require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/epilog_after.php');
