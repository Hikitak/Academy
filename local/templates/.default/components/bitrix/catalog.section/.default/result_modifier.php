<?php B_PROLOG_INCLUDED === true || die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */
$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

//$arTempID = array();
//foreach($arResult['ITEMS'] as $elem){
//    $arTempID[] = $elem['ID'];
//}
//$arFilter = false;
//if($arTempID!=array()){
//    $arFilter = array(
//        "IBLOCK_ID" => IBLOCK_NEWS_ID,
//        "ACTIVE" => "Y",
//        "PROPERTY_LINK_CAT" => $arTempID,
//    );
//}
//
//$arSort = false;
//
//$arGroupBy = false;
//$arNavStartParams = false;
//$arSelect = array("ID", "NAME", "PROPERTY_LINK_CAT");
//$BDPes = CIBlockELement::GetList(
//    $arSort,
//    $arFilter,
//    $arGroupBy,
//    $arNavStartParams,
//    $arSelect
//);
//
//$arResult["NEWS"] = array();
//while ($arRes = $BDPes->GetNext()){
//    $arResult["NEWS"][$arRes["PROPERTY_LINK_CAT_VALUE"]] = $arRes;
//}
$arTempID = $arResult['ITEMS'][0]['IBLOCK_SECTION_ID'];

$arSelect = Array("ID", "NAME","IBLOCK_SECTION_ID", "DATE_ACTIVE_FROM", "PROPERTY_MATERIAL");
$arFilter = Array("IBLOCK_ID"=>CATALOG_IBLOCK_ID, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y",  "IBLOCK_SECTION_ID"=>$arTempID);
$res = CIBlockElement::GetList(Array(), $arFilter, array("PROPERTY_MATERIAL"), false, $arSelect);
while($ob = $res->GetNextElement())
{
    $arFields = $ob->GetFields();
    $arMaterial[] = array(
        "PROPERTY_MATERIAL_VALUE" => $arFields["PROPERTY_MATERIAL_VALUE"],
        "NUMBER" => $arFields["CNT"],
    );
}

$this->SetViewTarget("materials");
foreach($arMaterial as $el){
    echo "<div>".$el["PROPERTY_MATERIAL_VALUE"]." (".$el["NUMBER"].") "."</div><br>";
}
$this->EndViewTarget("materials");

