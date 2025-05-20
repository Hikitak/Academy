<?php B_PROLOG_INCLUDED===true || die();

?>
<?php $this->SetViewTarget("news_detail_date");?>
    <br><span class="main_date"><?=$arResult['DISPLAY_ACTIVE_FROM'];?></span>
<?php $this->EndViewTarget("news_detail_date");?>
    <?php if(is_array($arResult["DETAIL_PICTURE"])):?>
        <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" align="left" alt="<?=$arResult["NAME"]?>"/>
    <?php endif;?>
    <?php if($arResult["DETAIL_TEXT"]): echo  $arResult["DETAIL_TEXT"]; endif;?>
