<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

/**
 * @var CMain $APPLICATION
 */

$APPLICATION->SetTitle("Статьи");
$APPLICATION->SetPageProperty('body-class', 'articles');
?>

<?php $APPLICATION->IncludeComponent(
    "bitrix:news",
    "articles",
    array(
        "IBLOCK_TYPE" => "lists",
        "IBLOCK_ID" => IBLOCK_ARTICLES_ID,
        "TEMPLATE_THEME" => "site",
        "NEWS_COUNT" => "8",
        "USE_SEARCH" => "N",
        "USE_RSS" => "N",
        "NUM_NEWS" => "20",
        "NUM_DAYS" => "180",
        "YANDEX" => "N",
        "USE_RATING" => "N",
        "USE_CATEGORIES" => "N",
        "USE_REVIEW" => "N",
        "USE_FILTER" => "Y",
        "FILTER_FIELD_CODE" => array(),
        "FILTER_PROPERTY_CODE" => array(),
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",
        "CHECK_DATES" => "Y",
        "SEF_MODE" => "Y",
        "SEF_FOLDER" => "/articles/",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_SHADOW" => "Y",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "AJAX_OPTION_HISTORY" => "N",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "DISPLAY_PANEL" => "Y",
        "SET_TITLE" => "N",
        "SET_STATUS_404" => "Y",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "ADD_ELEMENT_CHAIN" => "Y",
        "USE_PERMISSIONS" => "N",
        "PREVIEW_TRUNCATE_LEN" => "",
        "LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
        "LIST_FIELD_CODE" => array(
            0 => "DATE_ACTIVE_FROM",
            1 => "PREVIEW_TEXT",
            2 => "NAME",
            3 => "",
        ),
        "LIST_PROPERTY_CODE" => array(
            0 => "VIEW_COUNTER",
            1 => "",
            2 => "",
            3 => "",
        ),
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "DISPLAY_NAME" => "Y",
        "META_KEYWORDS" => "-",
        "META_DESCRIPTION" => "-",
        "BROWSER_TITLE" => "-",
        "DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
        "DETAIL_FIELD_CODE" => array(
            0 => "DATE_CREATE",
            1 => "DETAIL_TEXT",
            2 => "NAME",
            3 => "",
        ),
        "DETAIL_PROPERTY_CODE" => array(
            0 => "VIEW_COUNTER",
            1 => "",
            2 => "",
            6 => "",
        ),
        "DETAIL_DISPLAY_TOP_PAGER" => "N",
        "DETAIL_DISPLAY_BOTTOM_PAGER" => "N",
        "DETAIL_PAGER_TITLE" => "",
        "DETAIL_PAGER_TEMPLATE" => "",
        "DETAIL_PAGER_SHOW_ALL" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "PAGER_TITLE" => "",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => "main",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",
        "PAGER_SHOW_ALL" => "N",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "AJAX_OPTION_ADDITIONAL" => "",
        "SLIDER_PROPERTY" => "",
        "COMPONENT_TEMPLATE" => "",
        "FILTER_NAME" => "",
        "SET_LAST_MODIFIED" => "N",
        "STRICT_SECTION_CHECK" => "N",
        "USE_SHARE" => "N",
        "DETAIL_SET_CANONICAL_URL" => "N",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "SHOW_404" => "Y",
        "MESSAGE_404" => "",
        "SEF_URL_TEMPLATES" => array(
            "news" => "",
            "section" => "",
            "detail" => "#ELEMENT_CODE#/",
        )
    ),
    false
); ?>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>
