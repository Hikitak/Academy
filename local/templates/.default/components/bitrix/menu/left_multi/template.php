<?php B_PROLOG_INCLUDED === true || die();?>


<?php if (!empty($arResult)):?>
    <div class="sb_nav">
        <ul>
<?php
$previousLevel = 0;

foreach($arResult as $arItem):?>

	<?php if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?php endif?>

	<?php if ($arItem["IS_PARENT"]):?>

		<?php if ($arItem["DEPTH_LEVEL"] == 1):?>
            <li class="open current">
                <span class="sb_showchild"></span>
                <a href="<?=$arItem["LINK"]?>"><span><?=$arItem["TEXT"]?><span></a>
            <ul>

		<?php else:?>
            <li class="open current">
                <span class="sb_showchild"></span>
                <a href="<?=$arItem["LINK"]?>" ><span><?=$arItem["TEXT"]?></span></a>
            <ul>
		<?php endif?>
	<?php else:?>

        <?php if ($arItem["PERMISSION"] > "D"):?>
            <?php if ($arItem["DEPTH_LEVEL"] == 1):?>
                    <li><a href="<?=$arItem["LINK"]?>"><span><?=$arItem["TEXT"]?></span></a></li>
            <?php else:?>
                    <li><a href="<?=$arItem["LINK"]?>" <?php if ($arItem["SELECTED"]):?> class="item-selected"<?php endif?>><span><?=$arItem["TEXT"]?></span></a></li>
            <?php endif?>
        <?php endif?>

	<?php endif?>

	<?php $previousLevel = $arItem["DEPTH_LEVEL"];?>

<?php endforeach?>

<?php if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?php endif?>
          </ul>
    </div>
<?php endif?>