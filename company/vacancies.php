<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Вакансии");
?><?$APPLICATION->IncludeComponent(
	"mycomponents:vacancies.list", 
	"vac_list", 
	array(
		"COMPONENT_TEMPLATE" => "vac_list",
		"IBLOCK_TYPE" => "vacancies",
		"IBLOCK_ID" => "4",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_GROUPS" => "Y"
	),
	false
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>