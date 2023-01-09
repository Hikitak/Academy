<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Тест");

if(CModule::IncludeModule("iblock")) {

    $arSelect = array("ID", "NAME", "DATE_ACTIVE_FROM", "PROPERTY_PRICE");
    $arFilter = array("IBLOCK_ID" => DISCOUNTS_IBLOCK_ID, "<=DATE_ACTIVE_TO" => new \Bitrix\Main\Type\DateTime());
    $res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
    while ($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();
        dump($arFields);
        $arItems[] = $arFields;
    }

}
?><?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>