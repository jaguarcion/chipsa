<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>

<div class="news-page-container">
    <?$APPLICATION->IncludeComponent(
        "bitrix:catalog.section.list",
        "catalog_list",
        array(
            "ADD_SECTIONS_CHAIN" => "Y",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "N",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "COUNT_ELEMENTS" => "Y",
            "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
            "FILTER_NAME" => "sectionsFilter",
            "IBLOCK_ID" => "6",
            "IBLOCK_TYPE" => "content",
            "SECTION_CODE" => "",
            "SECTION_FIELDS" => array(
                0 => "",
                1 => "",
            ),
            "SECTION_ID" => $_REQUEST["SECTION_ID"],
            "SECTION_URL" => "#SITE_DIR#/news/#SECTION_CODE_PATH#/",
            "SECTION_USER_FIELDS" => array(
                0 => "",
                1 => "",
            ),
            "SHOW_PARENT_NAME" => "Y",
            "TOP_DEPTH" => "2",
            "VIEW_MODE" => "TEXT",
            "COMPONENT_TEMPLATE" => "catalog_list"
        ),
        false
    );?>


</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

