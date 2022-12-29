<?php B_PROLOG_INCLUDED===true||die();
?>
<?php if($arResult["ITEMS"]):?>
    <?php foreach($arResult["ITEMS"] as $arItem):?>
    <div class="sb_action">
        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt=""/></a>
        <h4><?=GetMessage('DISCOUNT')?></h4>
        <h5><a href="<?php echo $arItem["DETAIL_PAGE_URL"]?>">
                <?php echo $arItem["NAME"]?>
                <?php echo "&nbsp;"?>
                <?php echo "всего за"?>
                <?php echo $arItem["PROPERTIES"]["PRICE"]["VALUE"]?>
                <?="P"?>
                </a></h5>
        <a href="<?php echo $arItem["DETAIL_PAGE_URL"]?>" class="sb_action_more"><?=GetMessage('LEARN_MORE')?> &rarr;</a>
    </div>
    <?php endforeach;?>
<?php endif;?>