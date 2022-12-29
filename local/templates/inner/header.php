<?php B_PROLOG_INCLUDED === true || die();
use Bitrix\Main\Page\Asset;
?>
<?php
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE HTML>
<html lang="<?=LANGUAGE_ID;?>-<?=strtoupper(LANGUAGE_ID);?>">
<head>
    <?php $APPLICATION->ShowHead();?>
    <title><?php $APPLICATION->ShowTitle()?></title>

    <?php
    // для js-файлов
    Asset::getInstance()->addJs('/local/templates/.default/js/jquery-1.8.2.min.js');
    Asset::getInstance()->addJs('/local/templates/.default/js/functions.js');


    // для css-файлов
    Asset::getInstance()->addCss("/local/templates/.default/template_styles.css");
    ?>


    <link rel="shortcut icon" type="image/x-icon" href="/local/templates/.default/favicon.ico"/>
    <!--[if gte IE 9]><style type="text/css">.gradient {filter: none;}</style><![endif]-->
</head>
<body>
<?php $APPLICATION->ShowPanel();?>
<div class="wrap">
    <div class="hd_header_area">
        <?php include_once($_SERVER["DOCUMENT_ROOT"]."/local/templates/.default/include/header.php")?>
    </div>

    <!--- // end header area --->
    <?php $APPLICATION->IncludeComponent(
        "bitrix:breadcrumb",
        "nav",
        Array(
            "PATH" => "",
            "SITE_ID" => "s1",
            "START_FROM" => "0"
        )
    );?>
    <div class="main_container page">
        <div class="mn_container">
            <div class="mn_content">
                <div class="main_post">
                    <div class="main_title">
                        <p class="title">
                            <span>
                                <?php $APPLICATION->ShowTitle(false);?>
                                <?php $APPLICATION->ShowViewContent("stars")?>
                            </span>
                        </p>
                    </div>