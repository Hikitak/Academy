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
?><?$APPLICATION->IncludeComponent(
	"mycomponents:photo.random",
	"main",
	Array(
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "180",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => ".default",
		"DETAIL_URL" => "",
		"IBLOCKS_PROP" => "25",
		"IBLOCK_ID" => "2",
		"IBLOCK_TYPE" => "products",
		"IMG_HEIGHT" => "96",
		"IMG_WIDTH" => "130",
		"PARENT_SECTION" => ""
	)
);?><br>
 <?$APPLICATION->IncludeComponent(
	"mycomponents:photo.random", 
	"main", 
	array(
		"COMPONENT_TEMPLATE" => "main",
		"IBLOCK_TYPE" => "products",
		"IBLOCK_ID" => "2",
		"IBLOCKS_PROP" => "24",
		"IMG_WIDTH" => "130",
		"IMG_HEIGHT" => "96",
		"DETAIL_URL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "180",
		"CACHE_GROUPS" => "Y",
		"PARENT_SECTION" => ""
	),
	false
);?><br><?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>