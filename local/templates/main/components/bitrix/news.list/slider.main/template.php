<?php check_prolog();

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

if (!empty($arResult["ITEMS"])) { ?>
    <div class="section promo-slider-section">
        <div class="container">
            <div class="promo-slider swiper-container">
                <button class="slider-arrow slider-arrow-prev" aria-label="Назад">
                    <svg width="30" height="30">
                        <use xlink:href="#icon-arrow-down"/>
                    </svg>
                </button>
                <button class="slider-arrow slider-arrow-next" aria-label="Вперед">
                    <svg width="30" height="30">
                        <use xlink:href="#icon-arrow-down"/>
                    </svg>
                </button>
                <div class="swiper-wrapper">
                    <?php foreach ($arResult["ITEMS"] as $slide) {
                        $this->addEditAction($slide['ID'], $slide['EDIT_LINK'], CIBlock::getArrayById($slide["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->addDeleteAction($slide['ID'], $slide['DELETE_LINK'], CIBlock::getArrayById($slide["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

                        [$preTitle, $title, $linkTitle, $link, $picture] = [
                            $slide['~NAME'],
                            $slide['PREVIEW_TEXT'],
                            $slide['PROPERTIES']['LINK_TITLE']['VALUE'],
                            $slide['PROPERTIES']['LINK']['VALUE'],

                            $slide['PREVIEW_PICTURE']['SRC'],
                        ];
                        ?>
                        <div class="promo-slide swiper-slide" id="<?= $this->getEditAreaId($slide['ID']) ?>">
                            <div class="promo-slide-body">
                                <div class="promo-slide-title"><?= $preTitle ?></div>
                                <div class="promo-slide-desc"><?= $title ?></div>
                                <?php if ($link) { ?>
                                    <a href="<?= $link ?>" class="promo-slide-link"><?= $linkTitle ?></a>
                                <?php } ?>
                            </div>
                            <a href="<?= $link ?>" class="promo-slide-img">
                                <img src="<?= $picture ?>" srcset="<?= $picture ?> 2x" alt="">
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="slider-dots hidden-tablet"></div>
        </div>
    </div>
<?php } ?>