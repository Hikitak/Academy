<?php B_PROLOG_INCLUDED===true || die();
?>
<?php if($arResult["ITEMS"]):?>
    <?php foreach($arResult["ITEMS"] as $arItem):?>
        <div class="review-block">
            <div class="review-text">

                <div class="review-block-title"><span class="review-block-name"><a href="<?php echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></span><span class="review-block-description">
                        <?php echo $arItem["PROPERTIES"]["JOB_TITLE"]["VALUE"]?>
                        <?php echo "&nbsp;"?>
                        <?php echo $arItem["PROPERTIES"]["COMPANY_NAME"]["VALUE"]?>
                    </span>
                </div>

                <div class="review-text-cont">
                    <?php echo $arItem["PREVIEW_TEXT"];?>
                </div>
            </div>
            <div class="review-img-wrap"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img width="70px" height="70px" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="img"></a></div>
        </div>
    <?php endforeach;?>
<?php endif;?>


