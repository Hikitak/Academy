<?php
function AgentCheckPrice(){
    if(CModule::IncludeModule("iblock")) {

        $arSelect = array("ID", "NAME", "DATE_ACTIVE_FROM", "PROPERTY_PRICE");
        $arFilter = array("IBLOCK_ID" => CATALOG_IBLOCK_ID, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", "PROPERTY_PRICE" => false);
        $res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
        while ($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();
            $arItems[] = $arFields;
        }

        if(count($arItems)>0){
            CEventLog::Add(array(
                "SEVERITY" => "INFO",
                "AUDIT_TYPE_ID" => "CHECK_PRICE",
                "MODULE_ID" => "iblock",
                "ITEM_ID" => "",
                "DESCRIPTION" => "Проверка цен, нет цен для ".count($arItems)." элементов.",

            ));
            $filter = array("GROUPS_ID"=>array(GROUP_ADMIN_ID));
            $rsUsers = CUser::GetList(($by="personal_country"), ($order="desc"), $filter); // выбираем пользователей
            $arEmail = array();
            while($arUser = $rsUsers->GetNext()){
                $arEmail[] = $arUser["EMAIL"];
            }
            if(count($arEmail)>0){
                $arEventFields = array(
                    "TEXT" => count($arItems),
                    "EMAIL" => implode(", ", $arEmail),
                );
                CEvent::Send("CHECK_CATALOG", NEW_SITE_ID, $arEventFields);
            }
        }
    }
    return "AgentCheckPrice();";
}
function AgentCheckExpiredDiscount(){
    if(CModule::IncludeModule("iblock")) {

        $arSelect = array("ID", "NAME", "DATE_ACTIVE_FROM", "PROPERTY_PRICE");
        $arFilter = array("IBLOCK_ID" => DISCOUNTS_IBLOCK_ID, "<=DATE_ACTIVE_TO" => new \Bitrix\Main\Type\DateTime());
        $res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
        while ($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();
            $arItems[] = $arFields;
        }

        if(count($arItems)>0){
            CEventLog::Add(array(
                "SEVERITY" => "INFO",
                "AUDIT_TYPE_ID" => "CHECK_EXPIRED_DISCOUNTS",
                "MODULE_ID" => "iblock",
                "ITEM_ID" => "",
                "DESCRIPTION" => "Проверка даты активности, дата активности истекает для ".count($arItems)." акций.",

            ));
            $filter = array("GROUPS_ID"=>array(GROUP_ADMIN_ID));
            $rsUsers = CUser::GetList(($by="personal_country"), ($order="desc"), $filter); // выбираем пользователей
            $arEmail = array();
            while($arUser = $rsUsers->GetNext()){
                $arEmail[] = $arUser["EMAIL"];
            }
            if(count($arEmail)>0){
                $arEventFields = array(
                    "TEXT" => count($arItems),
                    "EMAIL" => implode(", ", $arEmail),
                );
                CEvent::Send("CHECK_EXPIRED_DISCOUNTS", NEW_SITE_ID, $arEventFields);
            }
        }
    }
    return "AgentCheckExpiredDiscount();";

}