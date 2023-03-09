<?php B_PROLOG_INCLUDED===true||die();?>

<?$APPLICATION->IncludeComponent(
    "bitrix:form.result.new",
    "resume",
    Array(
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "CHAIN_ITEM_LINK" => "",
        "CHAIN_ITEM_TEXT" => "",
        "LIST_URL" => 'result_list.php',
        "EDIT_URL" => 'result_edit.php',
        "IGNORE_CUSTOM_TEMPLATE" => "N",
        "NAME_TEMPLATE" => "",
        "SEF_MODE" => "N",
        "SUCCESS_URL" => "",
        "USE_EXTENDED_ERRORS" => "N",
        "VARIABLE_ALIASES" => Array(
            "WEB_FORM_ID"=>"WEB_FORM_ID",
            "RESULT_ID" => "RESULT_ID",
        ),
        "WEB_FORM_ID" => $arParams['WEB_FORM_ID']
    ),
    $component
);?>



