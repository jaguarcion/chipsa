<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
if (isset($_REQUEST['sortBy'])) {
    $sortBy = $_REQUEST['sortBy'];
} else {
    $sortBy = 'sort';
}
if ($sortBy == 'name') {
    $sortBy = 'NAME';
}
if ($sortBy == 'date') {
    $sortBy = 'TIMESTAMP_X';
}

if (isset($_REQUEST['orderBy'])) {
    if ($_REQUEST['orderBy'] == 'asc') {
        $orderBy = 'desc';
    } else {
        $orderBy = 'asc';
    }
} else {
    $orderBy = 'asc';
}

?>

<div class="news-page-container">
    <div class="sort-section">
        Сортировать по:
        <a rel="nofollow" <? if ($sortBy == 'name') : ?> class="current-sort" <? endif; ?>
           href="<?= $APPLICATION->GetCurPageParam('sortBy=name&orderBy='.$orderBy, array('sortBy', 'orderBy')) ?>"
        >
            <span class="sort">Названию</span>
        </a>
        <a rel="nofollow" <? if ($sortBy == 'date') : ?> class="current-sort" <? endif; ?>
           href="<?= $APPLICATION->GetCurPageParam('sortBy=date&orderBy='.$orderBy, array('sortBy', 'orderBy')) ?>"
        >
            <span class="sort">Дате</span>
        </a>
    </div>

    <div class="news-section">
        <div class="filter-section">
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
                    "SECTION_ID" => $_REQUEST["SECTION_CODE"],
                    "SECTION_URL" => "",
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
            <?$APPLICATION->IncludeComponent("bitrix:catalog.filter", "news.filter", Array(
                "CACHE_GROUPS" => "Y",	// Учитывать права доступа
                "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
                "CACHE_TYPE" => "A",	// Тип кеширования
                "FIELD_CODE" => array(	// Поля
                    0 => "NAME",
                    1 => "DATE_CREATE",
                ),
                "FILTER_NAME" => "arrFilter",	// Имя выходящего массива для фильтрации
                "IBLOCK_ID" => "6",	// Инфоблок
                "IBLOCK_TYPE" => "content",	// Тип инфоблока
                "LIST_HEIGHT" => "5",	// Высота списков множественного выбора
                "NUMBER_WIDTH" => "5",	// Ширина полей ввода для числовых интервалов
                "PAGER_PARAMS_NAME" => "arrPager",	// Имя массива с переменными для построения ссылок в постраничной навигации
                "PREFILTER_NAME" => "preFilter",	// Имя входящего массива для дополнительной фильтрации элементов
                "PRICE_CODE" => "",	// Тип цены
                "PROPERTY_CODE" => array(	// Свойства
                    0 => "",
                    1 => "",
                ),
                "SAVE_IN_SESSION" => "N",	// Сохранять установки фильтра в сессии пользователя
                "TEXT_WIDTH" => "20",	// Ширина однострочных текстовых полей ввода
                "COMPONENT_TEMPLATE" => ".default"
            ),
                false
            );?>
        </div>
    <?$APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "news_list",
        Array(
            "ACTIVE_DATE_FORMAT" => "j M Y",
            "ADD_SECTIONS_CHAIN" => "Y",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "CHECK_DATES" => "Y",
            "DETAIL_URL" => "",
            "DISPLAY_BOTTOM_PAGER" => "Y",
            "DISPLAY_DATE" => "Y",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "DISPLAY_TOP_PAGER" => "N",
            "FIELD_CODE" => array("",""),
            "FILTER_NAME" => "",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => "6",
            "IBLOCK_TYPE" => "content",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
            "INCLUDE_SUBSECTIONS" => "Y",
            "MESSAGE_404" => "",
            "NEWS_COUNT" => "2",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => ".default",
            "PAGER_TITLE" => "Новости",
            "PARENT_SECTION" => $_REQUEST['SECTION_ID'],
            "PARENT_SECTION_CODE" => "",
            "PREVIEW_TRUNCATE_LEN" => "",
            "PROPERTY_CODE" => array("",""),
            "SET_BROWSER_TITLE" => "Y",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "Y",
            "SET_META_KEYWORDS" => "Y",
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "Y",
            "SHOW_404" => "Y",
            "SORT_BY1" => "ID",
            "SORT_BY2" => "SORT",
            "SORT_ORDER1" => "DESC",
            "SORT_ORDER2" => "ASC",
            "STRICT_SECTION_CHECK" => "N"
        )
    );?>
    </div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

