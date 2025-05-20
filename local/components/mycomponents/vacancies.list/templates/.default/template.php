<?php
B_PROLOG_INCLUDED === true || die();
$arSection = array();
?>

<div class="vc_content">
    <?php foreach ($arResult['ITEMS'] as $key=>$val):?>
        <?php
    //Эрмитаж
        $this->AddEditAction($val['ID'],$val['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($val['ID'],$val['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('FAQ_DELETE_CONFIRM', array("#ELEMENT#" => CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_NAME")))));
        ?>
        <?php if(!in_array($val["IBLOCK_SECTION_ID"], $arSection)):
            $arSection[] = $val["IBLOCK_SECTION_ID"];?>
            <h2><?=CIBlockSection::GetByID($val["IBLOCK_SECTION_ID"])->GetNext()['NAME'];?>
                (<?php echo CIBlockElement::GetList(
                    array(),
                    array(
                        "IBLOCK_ID" => $val["IBLOCK_ID"],
                        "IBLOCK_SECTION_ID" => $val["IBLOCK_SECTION_ID"]),
                    array(),
                    false,
                    array('ID', 'NAME')
                ); ?>)
            </h2>
            <ul >
                <?php foreach ($arResult['ITEMS'] as $key_=>$val_): ?>
                    <?php if($val_["IBLOCK_SECTION_ID"]===$val["IBLOCK_SECTION_ID"]):?>
                        <?php
                        $arSelect = Array("DETAIL_PAGE_URL");
                        $arFilter = Array("IBLOCK_ID"=>IBLOCK_VAC_ID, "ID"=>$val_['ID'], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
                        $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
                        ?>
                            <li class="close" id="<?=$this->GetEditAreaId($val_['ID']);//Эрмитаж?>">
                                <h3><a style="text-decoration: none;color: #0e0e0e" href="<?=$res->GetNextElement()->GetFields()['DETAIL_PAGE_URL']?>"><?=$val_['NAME']?></a></h3>
                                <span class="vc_showchild">Подробнее</span>
                                <ul>
                                    <li>
                                        <?php if($val_['DETAIL_TEXT']): echo $val_['DETAIL_TEXT']; endif; ?>
                                    </li>
                                </ul>
                                <span class="vc_showchild-2 close">Скрыть подробности</span>
                            </li>

                    <?php endif;?>
                <?php endforeach;?>
            </ul>


        <?php  endif;?>
    <?php endforeach;?>
</div>

