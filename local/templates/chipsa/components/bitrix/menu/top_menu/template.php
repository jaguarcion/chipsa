<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="nav">
<?
$previousLevel = 0;
    foreach($arResult as $arItem):?>
        <?if ($arItem["IS_PARENT"]):?>
            <li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
            <ul class="sub-menu">
        <?else:?>
            <li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
        <?endif;?>
    <?endforeach;?>
            </ul>
    </li>
</ul>
<?endif;?>