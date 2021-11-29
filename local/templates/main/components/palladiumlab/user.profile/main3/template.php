<?php check_prolog();

use Palladiumlab\Management\User;

$user = User::current();

global $APPLICATION;
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */
if ($user->birthday === null) $birthday = ""; else
{
	$user->birthday->format("Y-m-d");
}
$gender = false;
if ($user->gender === "M") $gender = true;
$promotion = $user->promotion ? "active" : "";
if ($user->gender === "M")
$polM = "Мужской";
if ($user->gender === "F")
	$polM = "Женский";
?>
<div class="cabinet cabinet-profile">
        <div class="cabinet-section cabinet-section-profile-data">
            <p style="color: red"> <?= $arResult['ERROR'] ?></p>
            <div class="cabinet-profile-title-wrapp">
                <div class="cabinet-section-title">
                    Личная информация и подписки

                </div>
            </div>
            <form action="<?= POST_FORM_ACTION_URI ?>"
                  method="post"
                  class="cabinet-profile-form form">
				<?= bitrix_sessid_post() ?>
                <input type="hidden"
                       name="action"
                       value="update-profile">
                <div class="cabinet-profile-form-row flex-row">

                    <div class="cabinet-profile-form-col flex-row-item">

						<div class="form-block">
                            <span class="form-block-title">Пол:</span>
							<?= $polM ?>
                        </div>
                    </div>
                    <div class="cabinet-profile-form-col flex-row-item">

                    </div>
                    <div class="cabinet-profile-form-col flex-row-item">

                    </div>
                    <div class="cabinet-profile-form-col flex-row-item">
                        <label class="form-block">
                            <span class="form-block-title">Дата рождения:</span>
							<?= $user->birthday ?>
                        </label>
                    </div>
                    <div class="cabinet-profile-form-col flex-row-item"></div>
                    <div class="cabinet-profile-form-col flex-row-item">

                    </div>
                    <div class="cabinet-profile-form-col flex-row-item">
                        <label class="form-block">
                            <span class="form-block-title">Имя:</span>
							<?= $user->name ?>
                        </label>
                    </div>
                </div>


            </form>
        </div>
</div>
	<div class="cabinet-profile-form-submit-wrapp submit-wrapp" style="border-top: solid 1px #E2E2E2; padding-top: 20px; font-weight: 600; font-size: 15px; color: #4365AF;">
Управление подписками
                    <label class="checkbox-label <?= $promotion ?>">
                        <input type="checkbox"
                               class="checkbox-input"
                               name="promotion"
                        >
                        <span>E‐mail</span>
                    </label>
                </div>
	<p></p>
Управление подписками помогает пользователю получать только ту информацию от сайта gipermed.com, которая ему интересна. Чтобы настроить свои подписки, включите или, наоборот, отключите нужную вам категорию подписок в списке ниже.

<div class="cabinet-profile-form-submit-wrapp submit-wrapp" style="border-top: solid 1px #E2E2E2; padding-top: 20px; font-weight: 600; font-size: 15px; color: #4365AF;">
Сообщения о новых акциях
                    <label class="checkbox-label <?= $promotion ?>">
                        <input type="checkbox"
                               class="checkbox-input"
                               name="promotion"
                        >
                        <span>E‐mail</span>
                    </label>
                </div>
<p></p>
Вы будете получать еженедельные уведомления об акциях и скидках на сайте gipermed.com
<div class="cabinet-profile-form-submit-wrapp submit-wrapp" style="border-top: solid 1px #E2E2E2; padding-top: 20px; font-weight: 600; font-size: 15px; color: #4365AF;">
Запросы отзывов об удовлетворенности работой сервиса gipermed.com 
                    <label class="checkbox-label <?= $promotion ?>">
                        <input type="checkbox"
                               class="checkbox-input"
                               name="promotion"
                        >
                        <span>E‐mail</span>
                    </label>
                </div>
<p></p>
Мы стремимся улучшить наш сервис, поэтому можем связаться с вами для того, чтобы узнать, нравится ли вам как выглядит и работает сайт, как организовано оповещение и доставка.
<div class="cabinet-profile-form-submit-wrapp submit-wrapp" style="border-top: solid 1px #E2E2E2; padding-top: 20px; font-weight: 600; font-size: 15px; color: #4365AF;">
Сервисные сообщения
                    <label class="checkbox-label <?= $promotion ?>">
                        <input type="checkbox"
                               class="checkbox-input"
                               name="promotion"
                        >
                        <span>E‐mail</span>
                    </label>
                </div>
<p></p>
Вы будете получать сервисные уведомления о статусе заказа.

