<?php
B_PROLOG_INCLUDED===true || die();


#
# INPUT PARAMS
#
$arGadgetParams["WEB_FORM_ID"] = intval($arGadgetParams["WEB_FORM_ID"]);
if ($arGadgetParams["WEB_FORM_ID"] <= 0)
    return false;
$arGadgetParams["SHOW_UNACTIVE_ELEMENTS"] = $arGadgetParams["SHOW_UNACTIVE_ELEMENTS"]!="N";
if($arGadgetParams["TODAY_RESUME_URL"]=="")
    $arGadgetParams["TODAY_RESUME_URL"]='https://crt-kadatsky.ivb24.ru/bitrix/admin/form_field_list.php?PAGEN_1=1&SIZEN_1=20&ID=4&action_button=delete&lang=ru&WEB_FORM_ID=1&additional=ALL';
if($arGadgetParams["ALL_RESUME_URL"]=="")
    $arGadgetParams["ALL_RESUME_URL"]='https://crt-kadatsky.ivb24.ru/bitrix/admin/form_field_list.php?PAGEN_1=1&SIZEN_1=20&ID=4&action_button=delete&lang=ru&WEB_FORM_ID=1&additional=ALL';


#
# CACHE
#
$obCache = new CPageCache;
$cacheTime = 3600;
$cacheId = $arGadgetParams["WEB_FORM_ID"].$arGadgetParams["TODAY_RESUME_URL"].$arGadgetParams["ALL_RESUME_URL"].$arGadgetParams["SHOW_UNACTIVE_ELEMENTS"];

if($obCache->StartDataCache($cacheTime, $cacheId, "/")):
    if(!CModule::IncludeModule("form"))
    {
        ShowError(GetMessage("IBLOCK_MODULE_NOT_INSTALLED"));
        return;
    }?>
    <div>
        <a style="text-decoration: none;color: #0e0e0e" href="/new_page.php">
            <?="Резюме за все время: ".CFormResult::GetCount($arGadgetParams["WEB_FORM_ID"])?>
        </a>
    </div>
    <div style="clear: both;"></div>
    <br/>
    <div>
        <a style="text-decoration: none;color: #0e0e0e" href="/new_page.php">
            <?="Резюме за сегодня: ".(CFormResult::GetList($arGadgetParams["WEB_FORM_ID"],
            ($by="s_timestamp"),
            ($order="desc"),
            array("DATE_CREATE_1" => date('d.m.Y')),
            true,
            "Y")->AffectedRowsCount())?>
        </a>
    </div>
    <div style="clear: both;"></div>

    <?php $obCache->EndDataCache();

endif;