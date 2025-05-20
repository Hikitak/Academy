<?php
B_PROLOG_INCLUDED===true||die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>




<div class="review-feedback-form-wrap">
<div class="review-feedback-form-title">Оставьте свой отзыв</div>
<?php if(!empty($arResult["ERROR_MESSAGE"]))
{
	foreach($arResult["ERROR_MESSAGE"] as $v)
		ShowError($v);
}
if($arResult["OK_MESSAGE"] <> '')
{
	?><div class="mf-ok-text"><?=$arResult["OK_MESSAGE"]?></div><?
}
?>

<form  class="review-feedback-form" action="<?=POST_FORM_ACTION_URI?>" method="POST">
<?=bitrix_sessid_post()?>
    <div class="review-feedback-field-wrap">
									<span class="review-feedback-field">
										<span class="review-feedback-field-title"><?=GetMessage("MFT_NAME")?><?php if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?php endif?></span>
										<input class="review-feedback-inp" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>" type="text"/></span><span
                class="review-feedback-field">
											<span class="review-feedback-field-title"><?=GetMessage("MFT_EMAIL")?><?php if(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?php endif?></span>
											<input class="review-feedback-inp" name="user_email"  value="<?=$arResult["AUTHOR_EMAIL"]?>" type="email"/>
									</span>
    </div>


    <div class="review-feedback-text">
        <div class="review-feedback-text-title"><?=GetMessage("MFT_MESSAGE")?><?php if(empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?php endif?></div>
        <textarea name="MESSAGE" class="review-feedback-text-field"><?=$arResult["MESSAGE"]?></textarea>
    </div>




	<?php if($arParams["USE_CAPTCHA"] == "Y"):?>
	<div class="mf-captcha">
		<div class="mf-text"><?=GetMessage("MFT_CAPTCHA")?></div>
		<input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
		<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA">
		<div class="mf-text"><?=GetMessage("MFT_CAPTCHA_CODE")?><span class="mf-req">*</span></div>
		<input type="text" name="captcha_word" size="30" maxlength="50" value="">
	</div>
	<?php endif;?>
    <div class="review-feedback-btn-block">
        <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
        <input class="review-feedback-btn" value="Оставить свой отзыв" name="submit" type="submit"/>
    </div>

</form>
</div>