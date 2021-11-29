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
?>
<div class="cabinet-section cabinet-section-profile-data">
            <div class="cabinet-profile-title-wrapp">
                <div class="cabinet-section-title">
                    Профиль
                </div>
            </div>
			<div class="cabinet-profile-form-row flex-row">
            	<div class="cabinet-profile-form-col-mainp1 flex-row-item">
                	<label class="form-block">
                    	<span class="form-block-title">Здравствуйте, <?= $user->surname ?>!</span>
                    </label>
                </div>
                <div class="cabinet-profile-form-col-mainp2 flex-row-item">
	                <label class="form-block">
    	                <a href="?logout=yes&<?= bitrix_sessid_get() ?>"> <span>Выйти из аккаунта </span><img src="/local/templates/main/assets/img/exit_img.jpg" alt=""></a>
        	        </label>
                </div>
				<div class="cabinet-profile-form-col-mainp3 flex-row-item">
	                <img src="/local/templates/main/assets/img/Group_2852.jpg" alt="">
                </div>
            </div>
            <div class="cabinet-profile-form-row flex-row">
            	<div class="cabinet-profile-form-col-maintel flex-row-item">
                	<label class="form-block">
						<span class="form-block-title">Номер телефона:</span><span style="font-size: 18px; color: #000000"><?= $user->login ?></span>
                    </label>
                </div>
                <div class="cabinet-profile-form-col-mainemail flex-row-item">
	                <label class="form-block">
						<span class="form-block-title">Электронная почта:</span><span style="font-size: 18px; color: #000000"><?= $user->email ?></span>
        	        </label>
                </div>
            </div>
</div>
<div class="cabinet cabinet-profile">
    <div class="cabinet-profile-body-main">
		<div class="cabinet-profile-title-desc-main">Основные настройки</div>
		<div class="cabinet-section-main">
			<a href="/personal/orders/"> <span>Мои&nbsp;заказы</span> </a><br>
			<div class="cabinet-main-title"></div>
			<a href="/personal/profile/"> <span>Личная информация и подписки</span> </a><br>
			<div class="cabinet-main-title"></div>
			<a href="/personal/profile/review.php"> <span>Мои&nbsp;отзывы</span> </a><br>
			<div class="cabinet-main-title"></div>
			<a href="/personal/profile/adress.php"> <span>Мои&nbsp;адреса</span> </a><br>
		</div>
		<div class="cabinet-profile-title-desc-main"> Избранное и лист ожидания </div>
		<div class="cabinet-section-main">
			<a href="/personal/catalog/fav.php"> <span>Избранное</span> </a><br>
			<div class="cabinet-main-title"></div>
			<a href="/personal/catalog/await.php"> <span>Лист ожидания</span> </a><br>
    	</div>
		<div class="cabinet-profile-title-desc-main">Бонусная программа</div>
		<div class="cabinet-section-main">
			<a href="#"> <span>Мои бонусные рубли</span> </a><br>
			<div class="cabinet-main-title"></div>
			<a href="#"> <span>Приведи друга</span> </a>
    	</div>
		<div class="cabinet-profile-del-desc hidden-desktop"> 
				<div class="cabinet-profile-form-row flex-row">
					<div class="cabinet-profile-form-col-main flex-row-item">
						<label class="form-block">
							<a href="#modal-delprof" class="modal-open-btn"><button class="cabinet-profile-del-btn btn submit">Удалить профиль</button>                                    </a>
						</label>
					</div>
					<div class="cabinet-profile-form-col-main2 flex-row-item">
						<label class="form-block">
							<span class="form-block-title">Вы можете удалить свою учетную запись без возможности восстановления. Ваша история заказов будет очищена, а накопленные «Бонусные рубли» сгорят.</span>
						</label>
					</div>
				</div>
			</div>
    	</div>
	<div class="cabinet-profile-sidebar-main hidden-desktop">
		<img src="/local/templates/main/assets/img/Rectangle_85.jpg"
                 srcset="/local/templates/main/assets/img/loyalty-banner@2x.jpg 2x" alt="">
    </div>
	<div class="cabinet-profile-del visible-desktop">
        <div class="cabinet-profile-del-title">
            Удалить
            личный
            кабинет
        </div>
        <div class="cabinet-profile-del-desc">
            <p>
                Обращаем
                внимание,
                что
                при
                удалении
                личного
                кабинета
                будут
                обнулены
                все
                накопленные
                вами
                проценты.
            <p>
                Как
                только
                ваш
                Личный
                кабинет
                будет
                удален,
                вы
                автоматически
                выйдете
                из
                системы
                и
                больше
                не
                сможете
                войти
                в
                этот
                аккаунт.
        </div>
        <form action="<?= POST_FORM_ACTION_URI ?>"
              method="post"
              class="cabinet-password-form ordering-form form">
			<?= bitrix_sessid_post() ?>
            <input type="hidden"
                   name="action"
                   value="delete-profile">
            <button type="submit"
                    class="cabinet-profile-del-btn btn submit"
            >
                Удалить
                личный
                кабинет
            </button>
        </form>
    </div>
</div>




