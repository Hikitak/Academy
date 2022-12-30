<?php B_PROLOG_INCLUDED === true || die()?>
<?php if($arResult["ITEMS"]):?>
    <div class="cn_hp_lastnews">
        <h3><a href="/news/"><?=GetMessage('NEWS')?></a></h3>
        <ul>
            <?php foreach($arResult["ITEMS"] as $arItem):?>
            <li>
                <?php if($arItem["DISPLAY_ACTIVE_FROM"]):?>
                    <h4><a href="<?if($arItem["DETAIL_PAGE_URL"]): echo $arItem["DETAIL_PAGE_URL"]; endif; ?>"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></a></h4>
                <?php endif;?>
                <?php if($arItem["NAME"]):?>
                    <p><?=$arItem["NAME"]?></p>
                <?php endif;?>
            </li>
            <?php endforeach;?>

        </ul>
        <br>
        <a href="/news/" class="cn_hp_lastnews_more"><?=GetMessage('ALL_NEWS')?></a>
    </div>
<?php endif;?>

