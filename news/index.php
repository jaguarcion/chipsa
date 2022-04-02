<?
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("TITLE", "Новости");
$APPLICATION->SetPageProperty("description", "Новости");
    $APPLICATION->SetTitle("Новости");


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
    <?$APPLICATION->IncludeComponent("bitrix:news", "news", Array(
	"ADD_ELEMENT_CHAIN" => "N",	// Включать название элемента в цепочку навигации
		"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
		"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
		"DETAIL_DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"DETAIL_FIELD_CODE" => array(	// Поля
			0 => "",
			1 => "",
		),
		"DETAIL_PAGER_SHOW_ALL" => "Y",	// Показывать ссылку "Все"
		"DETAIL_PAGER_TEMPLATE" => "",	// Название шаблона
		"DETAIL_PAGER_TITLE" => "Страница",	// Название категорий
		"DETAIL_PROPERTY_CODE" => array(	// Свойства
			0 => "",
			1 => "",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",	// Устанавливать канонический URL
		"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
		"DISPLAY_DATE" => "Y",	// Выводить дату элемента
		"DISPLAY_NAME" => "Y",	// Выводить название элемента
		"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
		"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"FILTER_FIELD_CODE" => array(	// Поля
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "arrFilter",	// Фильтр
		"FILTER_PROPERTY_CODE" => array(	// Свойства
			0 => "",
			1 => "",
		),
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
		"IBLOCK_ID" => "6",	// Инфоблок
		"IBLOCK_TYPE" => "content",	// Тип инфоблока
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",	// Включать инфоблок в цепочку навигации
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"LIST_FIELD_CODE" => array(	// Поля
			0 => "",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(	// Свойства
			0 => "",
			1 => "",
		),
		"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
		"META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
		"META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
		"NEWS_COUNT" => "2",	// Количество новостей на странице
		"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
		"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
		"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
		"PAGER_TITLE" => "Новости",	// Название категорий
		"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
		"SEF_MODE" => "Y",	// Включить поддержку ЧПУ
		"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
		"SET_STATUS_404" => "N",	// Устанавливать статус 404
		"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
		"SHOW_404" => "N",	// Показ специальной страницы
		"SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
		"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
		"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
		"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
		"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела
		"USE_CATEGORIES" => "N",	// Выводить материалы по теме
		"USE_FILTER" => "N",	// Показывать фильтр
		"USE_PERMISSIONS" => "N",	// Использовать дополнительное ограничение доступа
		"USE_RATING" => "N",	// Разрешить голосование
		"USE_RSS" => "N",	// Разрешить RSS
		"USE_SEARCH" => "N",	// Разрешить поиск
		"USE_SHARE" => "N",	// Отображать панель соц. закладок
		"COMPONENT_TEMPLATE" => ".default",
		"SEF_FOLDER" => "/news/",	// Каталог ЧПУ (относительно корня сайта)
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "#SECTION_CODE#/",
			"detail" => "#SECTION_CODE#/#ELEMENT_CODE#/",
		)
	),
	false
);?>
</div>
</div>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>