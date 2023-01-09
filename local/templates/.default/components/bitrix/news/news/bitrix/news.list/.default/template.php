<?php B_PROLOG_INCLUDED===true||die();
?>
<?php if($arParams["DISPLAY_TOP_PAGER"]):?>
    <?=$arResult["NAV_STRING"]?><br />
<?php endif;?>
<?php foreach ($arResult["ITEMS"] as $arItem):?>
    <?php
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
        <p>
            <?php if($APPLICATION->GetTitle()==GetMessage('DISCOUNTS')):?>
                <span>
                    <?php echo $arResult["CAT_ELEM"][$arItem["PROPERTIES"]["LINK"]["VALUE"]]["NAME"]." всего за ".
                    $arResult["CAT_ELEM"][$arItem["PROPERTIES"]["LINK"]["VALUE"]]["PROPERTY_PRICE_VALUE"]." руб."?>
                </span>
            <?php endif;?>
        </p>
        <div class="clearboth"></div>
        <?php if($APPLICATION->GetTitle()==GetMessage('DISCOUNTS')):?>
            <a class="ps_backnewslist" href="<?=$arResult["CAT_ELEM"][$arItem["PROPERTIES"]["LINK"]["VALUE"]]["DETAIL_PAGE_URL"]?>">Подробнее →</a>
        <?php endif;?>


    </div>
</div>

<!--    <small>-->
<!--        --><?php //if(isset($arResult["CAT_ELEM"][$arItem["PROPERTIES"]["LINK_CAT"]["VALUE"]])):?>
<!--            <a href="--><?//=$arResult["CAT_ELEM"][$arItem["PROPERTIES"]["LINK_CAT"]["VALUE"]]["DETAIL_PAGE_URL"]?><!--">--><?//=$arResult["CAT_ELEM"][$arItem["PROPERTIES"]["LINK_CAT"]["VALUE"]]["NAME"];?><!--</a>-->
<!--            <br>--><?//=$arResult["CAT_ELEM"][$arItem["PROPERTIES"]["LINK_CAT"]["VALUE"]]["PROPERTY_PRICE_VALUE"];?>
<!--            <br>--><?//=$arResult["CAT_ELEM"][$arItem["PROPERTIES"]["LINK_CAT"]["VALUE"]]["PROPERTY_SIZE_VALUE"];?>
<!---->
<!--        --><?php //endif;?>
<!--    </small>-->
<br><br>
<?php endforeach;?>
<?php if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
    <br /><?=$arResult["NAV_STRING"]?>
<?php endif;?>


