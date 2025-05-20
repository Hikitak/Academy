<?php B_PROLOG_INCLUDED === true||die(); ?>


<div class="sl_slider" id="slides">
    <div class="slides_container">
        <?php foreach($arResult["ITEMS"] as $arItem):?>
        <div>
            <div>
                <?php if(is_array($arItem["PREVIEW_PICTURE"])):?>
                    <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="" />
                <?php endif;?>
                <h2><a href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>"><?php echo $arItem["NAME"]?></a></h2>
                <p><?php echo $arItem["PREVIEW_TEXT"]?></p>
                <a href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>" class="sl_more"><?=GetMessage('LEARN_MORE')?></a>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
