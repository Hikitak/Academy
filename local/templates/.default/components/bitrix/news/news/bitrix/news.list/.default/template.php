<?php B_PROLOG_INCLUDED===true||die();
?>
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
    <?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?php foreach ($arResult["ITEMS"] as $arItem):?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
<div id="<?=$this->GetEditAreaId($arItem['ID']);?>">
    <div class="ps_head"><a class="ps_head_link" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><h2 class="ps_head_h"><?=$arItem["NAME"]?></h2></a>
        <?php if($APPLICATION->GetTitle()!=GetMessage('DISCOUNTS')):?>
            <span class="ps_date">
                <?=$arItem["DISPLAY_ACTIVE_FROM"]?>
            </span>
        <?php endif;?>
    </div>
    <div class="ps_content">
        <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" align="left" alt="<?=$arItem["NAME"]?>"/>
        <p>
            <?php echo $arItem["PREVIEW_TEXT"];?>
        </p>
        <div class="clearboth"></div>
    </div>
</div>
<br><br>
<?php endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
    <br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
