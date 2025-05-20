<?php B_PROLOG_INCLUDED===true||die();?>
<?php
IncludeTemplateLangFile(__FILE__);
?>
<?php if (!empty($arResult)):?>
    <div class="ft_about">
    <h4><?=GetMessage("ABOUT")?></h4>
    <ul>

<?php
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>

		<li><a href="<?=$arItem["LINK"]?>" ><?=$arItem["TEXT"]?></a></li>

<?php endforeach?>

    </ul>
    </div><?php endif?>