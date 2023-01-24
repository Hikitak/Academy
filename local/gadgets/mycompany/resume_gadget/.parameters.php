<?php
B_PROLOG_INCLUDED===true||die();


if(!CModule::IncludeModule("form"))
    return false;
$arrForms = array();
$rsForm = CForm::GetList('s_sort', 'asc', !empty($_REQUEST["site"]) ? array("SITE" => $_REQUEST["site"]) : array());
while ($arForm = $rsForm->Fetch())
{
    $arrForms[$arForm["ID"]] = "[".$arForm["ID"]."] ".$arForm["NAME"];
}
$arParameters = Array(
    "PARAMETERS"=> Array(
        "WEB_FORM_ID" => array(
            "NAME" => GetMessage("COMP_FORM_PARAMS_WEB_FORM_ID"),
            "TYPE" => "LIST",
            "VALUES" => $arrForms,
            "REFRESH" => "Y",
            "DEFAULT" => "={\$_REQUEST[WEB_FORM_ID]}",
            "MULTIPLE" => "N",

        ),
    ),
    "USER_PARAMETERS"=> Array(
        "TODAY_RESUME_URL"=>array(
            "NAME" => GetMessage("TODAY_RESUME_URL"),
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
        "ALL_RESUME_URL"=>array(
            "NAME" => GetMessage("ALL_RESUME_URL"),
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
        "SHOW_UNACTIVE_ELEMENTS" => array(
            "NAME" => GetMessage("GD_PRODUCTS_SHOW_UNACTIVE"),
            "TYPE" => "CHECKBOX",
            "MULTIPLE" => "N",
            "DEFAULT" => "N",
        ),

    ),
);
