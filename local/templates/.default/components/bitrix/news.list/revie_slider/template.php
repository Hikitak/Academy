<? B_PROLOG_INCLUDED===true || die();
?>
<?php if($arResult["ITEMS"]):?>
<div class="rw_reviewed">
    <div class="rw_slider">
        <h4><?=GetMessage('REVIEWS')?></h4>
        <div class="caroufredsel_wrapper" style="display: block; text-align: start; float: none; position: relative; inset: auto; z-index: auto; width: 1050px; height: 218px; margin: 0px; overflow: hidden;"><ul id="foo" style="text-align: left; float: none; position: absolute; inset: 0px auto auto 0px; margin: 0px; width: 4200px; height: 218px; z-index: auto;">
                <?php foreach($arResult["ITEMS"] as $arItem):?>
                <li>
                    <div class="rw_message">
                        <?php if($arItem["PREVIEW_PICTURE"]["SRC"]):?>
                            <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="70px" height="70px" class="rw_avatar" alt="">
                        <?php endif;?>
                        <?php if($arItem["NAME"]):?>
                            <span class="rw_name"><?php echo $arItem["NAME"]?></span>
                        <?php endif;?>
                        <span class="rw_job">
                            <?php if($arItem["PROPERTIES"]["JOB_TITLE"]["VALUE"]): echo $arItem["PROPERTIES"]["JOB_TITLE"]["VALUE"]; endif;?>
                            <?php echo "&nbsp;"?>
                            <?php if($arItem["PROPERTIES"]["COMPANY_NAME"]["VALUE"]): echo $arItem["PROPERTIES"]["COMPANY_NAME"]["VALUE"]; endif;?>
                        </span>
                        <p> <?php if($arItem["PREVIEW_TEXT"]): echo $arItem["PREVIEW_TEXT"]; endif;?></p>
                        <div class="clearboth"></div>
                        <div class="rw_arrow"></div>
                    </div>
                </li>
                <?php endforeach;?>
                </ul>
        </div>
        <div id="rwprev" class="" style="display: block;"></div>
        <div id="rwnext" class="" style="display: block;"></div>
        <a href="/company/reviews/" class="rw_allreviewed"><?=GetMessage('ALL_REVIEWS')?></a>
    </div>
</div>
<?php endif;?>
