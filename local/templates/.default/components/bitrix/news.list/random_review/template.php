<?php B_PROLOG_INCLUDED===true||die();

?>
<?php if($arResult["ITEMS"]):?>
    <?php foreach($arResult["ITEMS"] as $arItem):?>
    <div class="sb_reviewed">
        <a href="<?php if($arItem["DETAIL_PAGE_URL"]): echo $arItem["DETAIL_PAGE_URL"]; endif;?>">
            <img width="70px" height="70px" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" class="sb_rw_avatar" alt=""/>
        </a>
        <?php if($arItem["NAME"]):?>
            <span class="sb_rw_name"><?php echo $arItem["NAME"]?></span>
        <?php endif;?>
            <span class="sb_rw_job">
                <?php if($arItem["PROPERTIES"]["JOB_TITLE"]["VALUE"]): echo $arItem["PROPERTIES"]["JOB_TITLE"]["VALUE"]; endif;?>
                <?php echo "&nbsp;"?>
                <?php if($arItem["PROPERTIES"]["COMPANY_NAME"]["VALUE"]): echo $arItem["PROPERTIES"]["COMPANY_NAME"]["VALUE"]; endif;?>
            </span>
        <?php if($arItem["PREVIEW_TEXT"]):?>
            <p> <?php echo $arItem["PREVIEW_TEXT"];?></p>
        <?php endif;?>
        <div class="clearboth"></div>
        <div class="sb_rw_arrow"></div>
    </div>
    <?php endforeach;?>
<?php endif;?>