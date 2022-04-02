<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

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
<div class="sort-section">
	Сортировать по:
	<a <? if ($sortBy == 'NAME') : ?> class="current-sort" <? endif; ?>
		href="<?= $APPLICATION->GetCurPageParam('sortBy=name&orderBy='.$orderBy, array('sortBy', 'orderBy')) ?>"
	>
		<span class="sort">Названию</span>
	</a>
	<a <? if ($sortBy == 'TIMESTAMP_X') : ?> class="current-sort" <? endif; ?>
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
		Array(
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
			"SECTION_CODE" => $_REQUEST["SECTION_CODE"],
			"SECTION_FIELDS" => array("", ""),
			"SECTION_ID" => $_REQUEST["SECTION_ID"],
			"SECTION_URL" => "#SECTION_CODE#/",
			"SECTION_USER_FIELDS" => array("", ""),
			"SHOW_PARENT_NAME" => "Y",
			"TOP_DEPTH" => "2",
			"VIEW_MODE" => "LINE"
		)
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
	"",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"NEWS_COUNT" => $arParams["NEWS_COUNT"],
		"SORT_BY1" => $sortBy,
		"SORT_ORDER1" => $orderBy,
		"FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
		"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
		"MESSAGE_404" => $arParams["MESSAGE_404"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"SHOW_404" => $arParams["SHOW_404"],
		"FILE_404" => $arParams["FILE_404"],
		"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_FILTER" => $arParams["CACHE_FILTER"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE" => $arParams["PAGER_TITLE"],
		"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
		"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
		"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
		"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
		"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
		"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
		"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
		"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
		"PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
		"ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
		"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
		"FILTER_NAME" => "arrFilter",
		"HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
	),
	$component
);?>
