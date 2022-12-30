<?php B_PROLOG_INCLUDED===true || die();
?>
<?php if($arResult["ITEMS"]):?>
    <?php foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="review-block">
            <div class="review-text">

                <div class="review-block-title"><span class="review-block-name"><a href="<?php echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></span><span class="review-block-description">
                        <?php if($arItem["PROPERTIES"]["JOB_TITLE"]["VALUE"]): echo $arItem["PROPERTIES"]["JOB_TITLE"]["VALUE"]; endif;?>
                        <?php echo "&nbsp;"?>
                        <?php if($arItem["PROPERTIES"]["COMPANY_NAME"]["VALUE"]): echo $arItem["PROPERTIES"]["COMPANY_NAME"]["VALUE"]; endif;?>
                    </span>
                </div>

                <div class="review-text-cont">
                    <?php if($arItem["PREVIEW_TEXT"]): echo $arItem["PREVIEW_TEXT"]; endif;?>
                </div>
            </div>
            <div class="review-img-wrap"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img width="70px" height="70px" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="img"></a></div>
        </div>
    <?php endforeach;?>
<?php endif;?>


