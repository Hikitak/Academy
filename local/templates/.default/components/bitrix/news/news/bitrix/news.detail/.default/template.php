<?php B_PROLOG_INCLUDED===true || die();

?>
    <?php if(is_array($arResult["DETAIL_PICTURE"])):?>
        <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" align="left" alt="<?=$arResult["NAME"]?>"/>
    <?php endif;?>
    <?php if($arResult["DETAIL_TEXT"]): echo  $arResult["DETAIL_TEXT"]; endif;?>
