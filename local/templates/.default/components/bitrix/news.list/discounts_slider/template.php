<?php B_PROLOG_INCLUDED===true || die();
$this->setFrameMode(true);
?>

<div class="sl_slider" id="slides">
    <div class="slides_container">
        <?php foreach($arResult["ITEMS"] as $arItem):?>
            <?php
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <div>
                    <?php if(is_array($arItem["PREVIEW_PICTURE"])):?>
                        <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="" />
                    <?php endif;?>
                    <h2><a href="<?=$arItem["PROPERTIES"]['LINK']['VALUE']?>"><?php echo $arItem["NAME"]?></a></h2>
                    <p><?php echo $arResult["CAT_ELEM"][$arItem["PROPERTIES"]["LINK"]["VALUE"]]["NAME"]." всего за ".
                            $arResult["CAT_ELEM"][$arItem["PROPERTIES"]["LINK"]["VALUE"]]["PROPERTY_PRICE_VALUE"]." руб.";?></p>
                    <a title="<?=$arResult["CAT_ELEM"][$arItem["PROPERTIES"]["LINK"]["VALUE"]]["NAME"]?>"
                       href="<?=$arResult["CAT_ELEM"][$arItem["PROPERTIES"]["LINK"]["VALUE"]]["DETAIL_PAGE_URL"]?>" class="sl_more">
                        Подробнее &rarr;
                    </a>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>

