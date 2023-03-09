<?php  B_PROLOG_INCLUDED===true || die();?>

<?php if(is_array($arResult["PICTURE"])):?>
<img src="<?=$arResult["PICTURE"]["src"]?>" alt="<?=$arResult["NAME"]?>"/>
<?php endif?>

<p><?php if($arResult["PREVIEW_TEXT"]): echo mb_substr($arResult["PREVIEW_TEXT"], 0, 60, "UTF-8"); endif; ?>...</p>
<div class="clearboth"></div>


