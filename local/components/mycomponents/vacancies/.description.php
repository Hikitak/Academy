<?php
B_PROLOG_INCLUDED === true || die();

$arComponentDescription = array(
    "NAME" => GetMessage("IBLOCK_NEWS_NAME"),
    "DESCRIPTION" => GetMessage("IBLOCK_NEWS_DESCRIPTION"),
//    "ICON" => "/images/aphisa.gif",
    "COMPLEX" => "Y",
    "PATH" => array(
        "ID" => "content",
        "CHILD" => array(
            "ID" => "vacancies2",
            "NAME" => GetMessage("T_IBLOCK_DESC_NEWS"),
            "SORT" => 10,
            "CHILD" => array(
                "ID" => "vacancies_cmpx",
            ),
        ),
    ),
);