<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

$this->setFrameMode(true);
?>
<!--noindex-->
<div id="callback" class="modal <?if($arParams['CUSTOM_CLASS']):?> <?=$arParams['CUSTOM_CLASS']?><?endif;?>">
    <a href="#" data-fancybox-close class="modal-close"><svg class="icon"><use xlink:href="#times-alt"></use></svg></a>
    <div class="modal-header-mobile">
        <a href="#" data-fancybox-close class="modal-close-mobile"><svg class="icon"><use xlink:href="#angle-return"></use></svg></a>
        <?=$arParams['FORM_TITLE']?>
    </div>
    <div class="modal-content text-center">
        <?if($arParams['~TITLE']):?><div class="modal-title"><?=$arParams['~TITLE']?></div><?endif;?>
        <?if($arParams['~SUBTITLE']):?><div class="modal-description"><?=$arParams['~SUBTITLE']?></div><?endif;?>
        <?if($arResult['ERROR_COUNTERS_ID']):?>
            <div class="prForm__error"><?=$arResult['ERROR_COUNTERS_ID']?></div>
        <?endif;?>
        <form enctype="multipart/form-data" class="prForm <?=$arParams['FORM_CLASS']?>" autocomplete="off" method="post" action="<?= $arResult['JS_OBJECT']['AJAX_PATH'] ?>">
            <?if($arResult['JS_OBJECT']['FIELDS']['ELEMENT_NAME']):?>
                <input value="<?=$arResult['JS_OBJECT']['FIELDS']['ELEMENT_NAME']?>" name="ELEMENT_NAME" type="hidden">
                <input value="<?=$arParams['ELEMENT_ID']?>" name="ELEMENT_ID" type="hidden">
            <?endif;?>
            <?if(!empty($arResult['FIELDS'])){?>
                <?foreach ($arResult['FIELDS'] as $field) {
                    if ($field['CODE'] == 'MESSAGE'):?>
                        <div class="form-group">
						    <textarea rows="5" name="<?= $field['CODE'] ?>" placeholder="<?=GetMessage('PRYMERY_FF_FIELD_'.$field['CODE'])?><?= ($field['REQUIRED'] == 'Y') ? ' *' : '' ?>" class="form-control <?=($field['REQUIRED'] == 'Y') ? ' required' : '' ?>"></textarea>
                        </div>
                    <?elseif($field['CODE'] != 'ELEMENT_ID'):?>
                        <div class="form-group field-required label-floating is-empty">
                            <label class="control-label"><?=GetMessage('PRYMERY_FF_FIELD_'.$field['CODE'])?><?= ($field['REQUIRED'] == 'Y') ? ' *' : '' ?></label>
                            <input class="form-control<?= ($field['CODE'] == 'PHONE') ? ' js-phone-masked' : '' ?><?= ($field['REQUIRED'] == 'Y') ? ' required' : '' ?>" name="<?= $field['CODE'] ?>" type="text">
                        </div>
                    <?endif;
                }?>
            <?}?>
            <div class="form-footer text-center"><button type="submit" class="btn btn--primary"><?=$arParams['~BUTTON']?></button></div>
	    </form>
        <div class="true-message" style="display: none;">
            <?=$arParams['TRUE_MESSAGE']?>
        </div>
        <script>$(document).ready(function(){initprForm(<?= CUtil::PhpToJSObject($arResult['JS_OBJECT']) ?>);});$('input[name=PHONE]').inputmask('(9)|(+7) (999)999-99-99');</script>
        <style>.modal {display: block;}</style>
    </div>
</div>
<!--/noindex-->