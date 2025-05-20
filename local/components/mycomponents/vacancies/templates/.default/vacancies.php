<?php B_PROLOG_INCLUDED===true||die();?>


<?$APPLICATION->IncludeComponent(
	"mycomponents:vacancies.list",
	"",
	Array(
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"]
	),
	$component
);?>