<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Профиль");
?><?php $APPLICATION->IncludeComponent(
	"bitrix:main.profile",
	"",
	Array(
		"CHECK_RIGHTS" => "N",
		"SEND_INFO" => "N",
		"SET_TITLE" => "Y",
		"USER_PROPERTY" => array(),
		"USER_PROPERTY_NAME" => ""
	)
);?><br><?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>