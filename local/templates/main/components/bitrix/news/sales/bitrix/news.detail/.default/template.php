<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
use \Bitrix\Main\Localization\Loc;
?>
<div class="sales-detail">
    <div class="sales-detail__header">
        <?if($arResult['PROPERTIES']['TOP_TITLE']['VALUE']):?>
            <div class="sales-detail__suptitle">
                <?=$arResult['PROPERTIES']['TOP_TITLE']['VALUE']?>
            </div>
        <?endif;?>
        <?if($arResult['PROPERTIES']['DATE']['VALUE']):?>
            <div class="sales-detail__date">
                <?=format_date($arResult['PROPERTIES']['DATE']['VALUE']);?>
            </div>
        <?endif;?>
    </div>
    <div class="sales-detail__img"<?if($arResult['PROPERTIES']['COLOR']['VALUE']):?> style="background: <?=$arResult['PROPERTIES']['COLOR']['VALUE']?>;"<?endif;?>>
        <div class="row">
            <div class="col-6">
                <div class="sales-detail__title"><?=$arResult['~NAME']?></div>
                <?if($arResult['PREVIEW_TEXT']):?>
                    <div class="sales-detail__description">
                        <?=$arResult['~PREVIEW_TEXT']?>
                    </div>
                <?endif;?>
            </div>
            <?if($arResult['DETAIL_PICTURE']):?>
                <div class="col-6">
                    <div class="sales-detail__thumb">
                        <img src="<?=$arResult['DETAIL_PICTURE']['src']?>" alt="<?=$arResult['NAME']?>">
                    </div>
                </div>
            <?endif;?>
        </div>
    </div>
    <?if($arResult['DETAIL_TEXT']):?>
        <div class="sales-detail__condiiton">
            <div class="row">
                <div class="col-12">
                    <h3><?=Loc::getMessage('SALE_CONDITIONAL_TITLE')?></h3>
                </div>
                <div class="col-12 col-md-6">
                    <?=$arResult['DETAIL_TEXT']?>
                </div>
                <div class="col-12 col-md-6">
                    <?=$arResult['PROPERTIES']['SECOND_DESC']['~VALUE']['TEXT'];?>
                </div>
            </div>
        </div>
    <?endif;?>
</div>