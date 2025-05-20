<?php
B_PROLOG_INCLUDED === true || die();
/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;


//we can't use $APPLICATION->SetAdditionalCSS() here because we are inside the buffered function GetNavChain()
$css = $APPLICATION->GetCSSArray("/local/templates/.default/template_styles.css");

//delayed function must return a string
if (empty($arResult))
    return "";

$strReturn = '<div class="bc_breadcrumbs"><ul>';

$itemSize = count($arResult);
for ($index = 0; $index < $itemSize; $index++) {
    $title = htmlspecialcharsex($arResult[$index]["TITLE"]);
    if ($arResult[$index]["LINK"] <> "") {
        $strReturn .= '<li><a href="' . $arResult[$index]["LINK"] . '"title"' . $title . '">' . $title . '</a></li>';
    } else {
        $strReturn .= '<li><a> ' . $title . '</a></li>';
    }
}

$strReturn .= '</ul><div class="clearboth"></div></div>';

return $strReturn;
