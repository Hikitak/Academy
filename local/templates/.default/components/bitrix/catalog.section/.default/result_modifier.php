<?php B_PROLOG_INCLUDED === true || die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */
$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

$arTempID = array();
foreach($arResult['ITEMS'] as $elem){
    $arTempID[] = $elem['ID'];
}
$arFilter = false;
if($arTempID!=array()){
    $arFilter = array(
        "IBLOCK_ID" => IBLOCK_NEWS_ID,
        "ACTIVE" => "Y",
        "PROPERTY_LINK_CAT" => $arTempID,
    );
}

$arSort = false;

$arGroupBy = false;
$arNavStartParams = false;
$arSelect = array("ID", "NAME", "PROPERTY_LINK_CAT");
$BDPes = CIBlockELement::GetList(
    $arSort,
    $arFilter,
    $arGroupBy,
    $arNavStartParams,
    $arSelect
);

$arResult["NEWS"] = array();
while ($arRes = $BDPes->GetNext()){
    $arResult["NEWS"][$arRes["PROPERTY_LINK_CAT_VALUE"]] = $arRes;
}
