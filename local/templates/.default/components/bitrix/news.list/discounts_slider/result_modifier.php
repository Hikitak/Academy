<?php
$arTempID = array();
foreach ($arResult['ITEMS'] as $elem) {
    $arTempID[] = $elem['PROPERTIES']['LINK']['VALUE'];
}
$arFilter = $arTempID == array() ? false : $arFilter = array(
    "IBLOCK_ID" => IBLOCK_CAT_ID,
    "ACTIVE" => "Y",
    "ID" => $arTempID,
);
$arSort = false;

$arGroupBy = false;
$arNavStartParams = false;
$arSelect = array("ID", "NAME", "DETAIL_PAGE_URL", "PROPERTY_PRICE");
$BDPes = CIBlockELement::GetList(
    $arSort,
    $arFilter,
    $arGroupBy,
    $arNavStartParams,
    $arSelect
);
$arResult["CAT_ELEM"] = array();
while ($arRes = $BDPes->GetNext()) {
    $arResult["CAT_ELEM"][$arRes["ID"]] = $arRes;
}

