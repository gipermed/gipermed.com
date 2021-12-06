<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetTitle("");
$APPLICATION->SetPageProperty('title', 'Лист ожидания');

use Bitrix\Main\Loader;

Loader::includeModule("highloadblock");

use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;

if (!$USER->IsAuthorized())
{
    $_SESSION["BACKURL"] = $APPLICATION->GetCurPage();
    LocalRedirect("/auth/");
}
?><div class="cabinet cabinet-addresses">
    <div class="cabinet-section-title">
        Мои адреса
    </div>
</div>