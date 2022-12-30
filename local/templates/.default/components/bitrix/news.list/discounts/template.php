<?php B_PROLOG_INCLUDED===true||die();
?>
<?php if($arResult["ITEMS"]):?>
    <?php foreach($arResult["ITEMS"] as $arItem):?>
    <div class="sb_action">
        <?php if($arItem["PREVIEW_PICTURE"]["SRC"]):?>
            <a href="<?if($arItem["DETAIL_PAGE_URL"]): echo $arItem["DETAIL_PAGE_URL"]; endif; ?>">
                <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt=""/>
            </a>
        <?php endif;?>
        <h4><?=GetMessage('DISCOUNT')?></h4>
        <h5><a href="<?php echo $arItem["DETAIL_PAGE_URL"]?>">
                <?php if($arItem["NAME"]): echo $arItem["NAME"]; endif;?>
                <?php echo "&nbsp;"?>
                <?php echo "всего за"?>
                <?php if($arItem["PROPERTIES"]["PRICE"]["VALUE"]):echo $arItem["PROPERTIES"]["PRICE"]["VALUE"]; endif;?>
                <?="P"?>
                </a></h5>
        <a href="<?php if($arItem["DETAIL_PAGE_URL"]): echo $arItem["DETAIL_PAGE_URL"]; endif;?>" class="sb_action_more"><?=GetMessage('LEARN_MORE')?> &rarr;</a>
    </div>
    <?php endforeach;?>
<?php endif;?>