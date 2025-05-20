<?php
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", Array("CIBLockHandler", "OnBeforeIBlockElementUpdateHandler"));
AddEventHandler("iblock", "OnBeforeIBlockElementDelete", Array("CIBLockHandler", "OnBeforeIBlockElementDeleteHandler"));

class CIBLockHandler
{
    // создаем обработчик события "OnBeforeIBlockElementUpdate"
    function OnBeforeIBlockElementUpdateHandler(&$arFields)
    {
        if($arFields['IBLOCK_ID'] == CATALOG_IBLOCK_ID){
            $db_props = CIBlockElement::GetProperty($arFields['IBLOCK_ID'], $arFields['ID'], array("sort" => "asc"), Array("CODE"=>"PRICE"));
            if($ar_props = $db_props->Fetch()){

                if(strlen($arFields['PROPERTY_VALUES'][$ar_props["ID"]][$ar_props["PROPERTY_VALUE_ID"]]['VALUE'])>0){
                    $arFields['PROPERTY_VALUES'][$ar_props["ID"]][$ar_props["PROPERTY_VALUE_ID"]]['VALUE'] = preg_replace("/[^\d]/","",$arFields['PROPERTY_VALUES'][$ar_props["ID"]][$ar_props["PROPERTY_VALUE_ID"]]['VALUE']);
                }
            }
        }
        else if($arFields['IBLOCK_ID'] == NEWS_IBLOCK_ID){
            if($arFields['ACTIVE']=='N'){

                $arSelect = Array(
                    "ID",
                    "IBLOCK_ID",
                    "NAME",
                    "ACTIVE",
                    "ACTIVE_FROM"
                );
                $arFilter = Array(
                    "IBLOCK_ID"=>NEWS_IBLOCK_ID,
                    "ID"=>$arFields["ID"]

                );
                $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
                while($ob = $res->GetNextElement())
                {
                    $arItem[] = $ob->GetFields();
                }
                if($arItem[0]['ACTIVE']=='Y' && date("Y-m-d") <= date("Y-m-d",strtotime($arItem[0]["ACTIVE_FROM"].'+ 3 days')) ){
                    global $APPLICATION;
                    $APPLICATION->throwException("Вы деактивируете свежую новость");
                    return false;
                }


            }
        }


    }
    function OnBeforeIBlockElementDeleteHandler($ID)
    {

            if ($ID > 0) {
                $arSelect = Array(
                    "ID",
                    "IBLOCK_ID",
                    "ACTIVE",
                    "SHOW_COUNTER",
                );
                $arFilter = Array(
                    "ID"=>$ID,

                );
                $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
                while($ob = $res->GetNextElement())
                {
                    $arItem[] = $ob->GetFields();
                }
                $counts = $arItem[0]['SHOW_COUNTER'];
                if($counts>1){

                    (new CIBlockElement())->Update($ID, ['ACTIVE'=>'N']);
                    $GLOBALS['DB']->Commit();
                    $GLOBALS['DB']->StartTransaction();
                    $GLOBALS['APPLICATION']->throwException("Товар деактивирован. Количество просмотров: ". $counts);
                    return false;
                }

            }

    }
}

AddEventHandler("main", "OnBeforeEventAdd", Array("CMainHandler", "OnBeforeEventAddHandler"));
AddEventHandler("main", "OnBeforeUserAdd", Array("CMainHandler", "OnBeforeUserAddHandler"));
AddEventHandler("main", "OnBeforeUserUpdate", Array("CMainHandler", "OnBeforeUserUpdateHandler"));

class CMainHandler
{
    function OnBeforeUserAddHandler(&$arFields)
    {
        if($arFields["LAST_NAME"] == $arFields["NAME"])
        {
            global $APPLICATION;
            $APPLICATION->throwException("Имя и Фамилия одинаковы!");
            return false;
        }
    }
    function OnBeforeUserUpdateHandler(&$arFields)
    {
        $arGroupsAfter=array();
        $arGroupsBefore = CUser::GetUserGroup($arFields["ID"]);
        foreach($arFields["GROUP_ID"] as $aGroup){
            $arGroupsAfter[]=strval($aGroup["GROUP_ID"]);
        }
        echo GROUP_CONTENT_ID;
        dump($arGroupsBefore);
        dump($arGroupsAfter);
        echo ((!in_array(GROUP_CONTENT_ID, $arGroupsBefore)) && (in_array(GROUP_CONTENT_ID, $arGroupsAfter)))?"1":"2";

        if((!in_array(GROUP_CONTENT_ID, $arGroupsBefore)) && (in_array(GROUP_CONTENT_ID, $arGroupsAfter))){
            $DBUsers=CUser::GetList(($by="id"), ($order="asc"), array("GROUPS_ID" => GROUP_CONTENT_ID), array("FIELDS" => array("NAME", "LAST_NAME", "EMAIL")));
            while ($arUser = $DBUsers->Fetch())
            {
                //Формируем поля для отправки
                $arSendFields=array(
                    "MEMBER_EMAIL" => $arUser["EMAIL"],
                    "MEMBER_NAME" => $arUser["NAME"]." ".$arUser["LAST_NAME"],
                );
                dump($arSendFields);
                CEvent::Send("NEW_CONTENT_USER", NEW_SITE_ID, $arSendFields);


            }
        }
    }
    function OnBeforeEventAddHandler(&$event, &$lid, &$arFields)
    {
        /*if($event == "FEEDBACK_FORM"){
            if(CMOdule::IncludeModule("iblock"))
            {
                $el = new CIBlockElement;
                $arLoadProductArray=array(
                    "IBLOCK_ID" => FEEDBACK_IBLOCK_ID,
                    "NAME" => $arFields["AUTHOR"],
                    "DETAIL_TEXT" => $arFields["TEXT"],
                    "DATE_ACTIVE_FROM" => ConvertTimeStamp(false,"FULL"),
                );
                $el->Add($arLoadProductArray);
                echo $el->LAST_ERROR;
                die();
            }
        }*/
    }
}

