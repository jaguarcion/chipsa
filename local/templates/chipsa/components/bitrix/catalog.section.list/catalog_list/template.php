<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="catalog-nav">
    <p class="catalog-nav-title">Список разделов:</p>
    <ul>
        <?php
            foreach ($arResult['SECTIONS'] as $arSection)
            {
                $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
                $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

                ?><li id="<? echo $this->GetEditAreaId($arSection['ID']); ?>"><h2 class="bx_catalog_text_title"><a href="<? echo $arSection['SECTION_PAGE_URL']; ?>"><? echo $arSection['NAME']; ?></a><?
                    if ($arParams["COUNT_ELEMENTS"] && $arSection['ELEMENT_CNT'] !== null)
                    {
                        ?> <span>(<? echo $arSection['ELEMENT_CNT']; ?>)</span><?
                    }
                    ?></h2></li><?
            }
        ?>
    </ul>
</div>
