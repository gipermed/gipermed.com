<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 */
?>
<script id="basket-total-template" type="text/html">

    <div class="cart-sidebar">
        <div class="cart-sidebar-desc">Точные стоимость и дату доставки можно будет посмотреть при оформении заказа </div>
        <div class="cart-sidebar-order">
            <div class="cart-sidebar-order-title">Ваш заказ</div>
            <div class="cart-sidebar-order-info">
                <div class="cart-sidebar-order-info-title">Товары (<span>5</span>)</div>
                {{#DISCOUNT_PRICE_FORMATED}}
                    <div class="cart-sidebar-order-info-sum">{{{PRICE_WITHOUT_DISCOUNT_FORMATED}}}</div>
                {{/DISCOUNT_PRICE_FORMATED}}

                {{^DISCOUNT_PRICE_FORMATED}}
                    <div class="cart-sidebar-order-info-sum">{{{PRICE_FORMATED}}}</div>

                {{/DISCOUNT_PRICE_FORMATED}}
            </div>

            {{#DISCOUNT_PRICE_FORMATED}}
            <div class="cart-sidebar-order-info cart-sidebar-order-info-sale">
                <div class="cart-sidebar-order-info-title">Скидка</div>
                <div class="cart-sidebar-order-info-sum">- {{{DISCOUNT_PRICE_FORMATED}}}</div>
            </div>
            {{/DISCOUNT_PRICE_FORMATED}}

        </div>
        <div  class="cart-promo form hidden-mobile">
            <label class="form-block" aria-label="Введите промокод">
                <input type="text" class="input" placeholder="Введите промокод" data-entity="basket-coupon-input" required>
            </label>
            <button data-entity="basket_coupon-btn" type="submit" class="btn
            submit">Применить</button>
        </div>
            <div class="basket-coupon-alert-section">
                <div class="basket-coupon-alert-inner">
                    {{#COUPON_LIST}}
                    <div class="basket-coupon-alert text-{{CLASS}}">
						<span class="basket-coupon-text">
							<strong>{{COUPON}}</strong> - <?=Loc::getMessage('SBB_COUPON')?> {{JS_CHECK_CODE}}
							{{#DISCOUNT_NAME}}({{DISCOUNT_NAME}}){{/DISCOUNT_NAME}}
						</span>
                        <span class="close-link" data-entity="basket-coupon-delete" data-coupon="{{COUPON}}">
							<?=Loc::getMessage('SBB_DELETE')?>
						</span>
                    </div>
                    {{/COUPON_LIST}}
                </div>
            </div>
        <div class="cart-sidebar-total">
            <div class="cart-sidebar-total-title">Итого</div>
            <div class="cart-sidebar-total-sum">{{{PRICE_FORMATED}}}</div>
        </div>
        <a href="#" data-entity="basket-checkout-button" class="btn btn-full btn-green cart-btn">Перейти к оформлению</a>
    </div>
    <div class="cart-promo form visible-mobile">
        <label class="form-block" aria-label="Введите промокод">
            <input type="text" class="input" placeholder="Введите промокод"  required>
        </label>
        <span class="btn submit basket-coupon-block-coupon-btn"></span>
        <button  type="button" class="btn
        submit">Применить</button>
    </div>

</script>