<?php B_PROLOG_INCLUDED===true||die();

?>
<?php if($arResult["ITEMS"]):?>
    <?php foreach($arResult["ITEMS"] as $arItem):?>
    <div class="sb_reviewed">
        <?php if($arItem["PREVIEW_PICTURE"]["SRC"]):?>
            <img width="70px" height="70px" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" class="sb_rw_avatar" alt=""/>
        <?php endif;?>
        <?php if($arItem["NAME"]):?>
            <span class="sb_rw_name"><?php echo $arItem["NAME"]?></span>
        <?php endif;?>
        <?php if($arItem["PROPERTIES"]["JOB_TITLE"]["VALUE"] || $arItem["PROPERTIES"]["COMPANY_NAME"]["VALUE"]):?>
            <span class="sb_rw_job">
                <?php echo $arItem["PROPERTIES"]["JOB_TITLE"]["VALUE"]?>
                <?php echo "&nbsp;"?>
                <?php echo $arItem["PROPERTIES"]["COMPANY_NAME"]["VALUE"]?>
            </span>
        <?php endif;?>
        <?php if($arItem["PREVIEW_TEXT"]):?>
            <p> <?php echo $arItem["PREVIEW_TEXT"];?></p>
        <?endif;?>
        <div class="clearboth"></div>
        <div class="sb_rw_arrow"></div>
    </div>
    <?php endforeach;?>
<?php endif;?>