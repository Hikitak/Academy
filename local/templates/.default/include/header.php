<?php B_PROLOG_INCLUDED === true || die() ;
?>


    <div class="hd_header">
        <table>
            <tbody><tr>
                <td rowspan="2" class="hd_companyname">
                    <h1><?php $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_RECURSIVE" => "Y",
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/logo.php"
                            )
                        );?></h1>
                </td>
                <td rowspan="2" class="hd_txarea">
                    <span class="tel"><?php $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_RECURSIVE" => "Y",
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/phone.php"
                            )
                        );?></span>	<br>
                    <?=GetMessage("WORKING_TIME")?> <span class="workhours">ежедневно с 9-00 до 18-00</span>
                </td>
                <td style="width:232px">
                    <?$APPLICATION->IncludeComponent(
	"bitrix:search.form", 
	"head", 
	array(
		"COMPONENT_TEMPLATE" => "head",
		"PAGE" => "#SITE_DIR#search/",
		"USE_SUGGEST" => "N"
	),
	false
);?>
                </td>
            </tr>
            <tr>
                <td style="padding-top: 11px;">
                    <?php $APPLICATION->IncludeComponent(
	"bitrix:system.auth.form", 
	"auth", 
	array(
		"FORGOT_PASSWORD_URL" => "/user/",
		"PROFILE_URL" => "/user/profile.php",
		"REGISTER_URL" => "/user/registration.php",
		"SHOW_ERRORS" => "Y",
		"COMPONENT_TEMPLATE" => "auth"
	),
	false
);?>
                </td>
            </tr>
            </tbody></table>
        <?php $APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"top_multi", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"DELAY" => "N",
		"MAX_LEVEL" => "2",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_USE_GROUPS" => "N",
		"ROOT_MENU_TYPE" => "top",
		"USE_EXT" => "N",
		"COMPONENT_TEMPLATE" => "top_multi"
	),
	false
);?>
    </div>

