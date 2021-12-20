<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetTitle("Мои адреса");
$APPLICATION->SetPageProperty('title', 'Мои адреса');

use Bitrix\Main\Loader;

Loader::includeModule("highloadblock");

use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;

if (!$USER->IsAuthorized())
{
    $_SESSION["BACKURL"] = $APPLICATION->GetCurPage();
    LocalRedirect("/auth/");
}
?><div class="cabinet cabinet-addresses" style="border: solid 0px ">
    <div class="cabinet-section-title">
        Мои адреса
    </div>
    <div style="font-size: 15px; font-weight: 500; color: #000000; text-align: left; margin-bottom: 10px">При оформлении заказа выберите необходимый для доставки адрес из выпадающего списка.</div>
</div>

<?php
$hlbl = 3; // Указываем ID нашего highloadblock блока к которому будет делать запросы.
$hlblock = HL\HighloadBlockTable::getById($hlbl)->fetch();

$entity = HL\HighloadBlockTable::compileEntity($hlblock);
$entity_data_class = $entity->getDataClass();

$rsData = $entity_data_class::getList(array(
    "select" => array("*"),
    "order" => array("ID" => "ASC"),
    "filter" => array("UF_ID_USER"=>$USER->GetID())  // Задаем параметры фильтра выборки
));
?>
    <div class="cabinet-profile-form-row1 flex-row" style="margin: 30px">
        <?
        while($arData = $rsData->Fetch()){
            ?>
            <div class="cabinet-profile-form-col-maintel flex-row-item delnew " style="width: 30%">
                <div class="cabinet-profile-form-row flex-row">
                    <div class="cabinet-profile-form-col-mainp1 flex-row-item" style="width: 50%">
                        <label class="form-block">
                            <a href="#modal-delAdr" class=" modal-open-btn cabinet-address-item-editnew"> <span style="font-size: 18px; font-weight: 600; color: #4365AF; text-align: left; margin-bottom: 10px"><?=$arData['UF_TYPE_ADR']; ?></span> &nbsp; <img src="/local/templates/main/assets/img/delAdr.jpg" alt=""><b><span id="user-region"> </span></b></a>
                        </label>
                    </div>
                    <div class="cabinet-profile-form-col-mainp2 flex-row-item" style="width: 50%">
                        <label class="form-block">
                            <a href="#" class="cabinet-address-item-delnew"> <span class="form-block-title"style="font-size: 15px; font-weight: 500; color: #545454; text-align: right; margin-bottom: 10px">Удалить адрес</span></a>
                        </label>
                    </div>
                </div>
                <input type="hidden" class="input cabinet-address-input-id" value="<?=$arData['ID']; ?>">
                <input type="hidden" class="input cabinet-address-input-typeadr" value="<?=$arData['UF_TYPE_ADR']; ?>">
                <input type="hidden" class="input cabinet-address-input-cityn" value="<?=$arData['UF_CITY']; ?>">
                <input type="hidden" class="input cabinet-address-input-street" value="<?=$arData['UF_STREET']; ?>">
                <input type="hidden" class="input cabinet-address-input-home" value="<?=$arData['UF_HOME']; ?>">
                <input type="hidden" class="input cabinet-address-input-korpus" value="<?=$arData['UF_KORPUS']; ?>">
                <input type="hidden" class="input cabinet-address-input-stroenie" value="<?=$arData['UF_STROENIE']; ?>">
                <input type="hidden" class="input cabinet-address-input-kvartira" value="<?=$arData['UF_KVARTIRA']; ?>">
                <input type="hidden" class="input cabinet-address-input-coment" value="<?=$arData['UF_COMENT']; ?>">

                <div style="font-size: 13px; font-weight: 500; text-align: left; margin-bottom: 5px">Адрес доставки:</div>
                <div style="font-size: 13px; font-weight: 400; text-align: left; margin-bottom: 25px" >Нас. пункт: <?=$arData['UF_CITY']; ?>, ул.<?=$arData['UF_STREET']; ?>, дом: <?=$arData['UF_HOME']; ?>, корп. <?=$arData['UF_KORPUS']; ?>, стр. <?=$arData['UF_STROENIE']; ?>, кв. <?=$arData['UF_KVARTIRA']; ?></div>

                <div style="font-size: 13px; font-weight: 500; text-align: left; margin-bottom: 5px">Коментарий курьеру:</div>
                <div style="font-size: 13px; font-weight: 400; text-align: left; margin-bottom: 25px" ><?=$arData['UF_COMENT']; ?></div>

            </div>
            <?php
        }
        ?>
    </div>
    <div class="cabinet cabinet-addresses1">
        <div class="cabinet-address-add">
            <a href="#"
               class="cabinet-address-add-btn">
                <svg width="24"
                     height="24"
                     viewBox="0 0 24 24"
                     fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          clip-rule="evenodd"
                          d="M12 5.25C12.1989 5.25 12.3897 5.32902 12.5303 5.46967C12.671 5.61032 12.75 5.80109 12.75 6V12C12.75 12.1989 12.671 12.3897 12.5303 12.5303C12.3897 12.671 12.1989 12.75 12 12.75H6C5.80109 12.75 5.61032 12.671 5.46967 12.5303C5.32902 12.3897 5.25 12.1989 5.25 12C5.25 11.8011 5.32902 11.6103 5.46967 11.4697C5.61032 11.329 5.80109 11.25 6 11.25H11.25V6C11.25 5.80109 11.329 5.61032 11.4697 5.46967C11.6103 5.32902 11.8011 5.25 12 5.25Z"
                          fill="#545454"/>
                    <path fill-rule="evenodd"
                          clip-rule="evenodd"
                          d="M11.25 12C11.25 11.8011 11.329 11.6103 11.4697 11.4697C11.6103 11.329 11.8011 11.25 12 11.25H18C18.1989 11.25 18.3897 11.329 18.5303 11.4697C18.671 11.6103 18.75 11.8011 18.75 12C18.75 12.1989 18.671 12.3897 18.5303 12.5303C18.3897 12.671 18.1989 12.75 18 12.75H12.75V18C12.75 18.1989 12.671 18.3897 12.5303 18.5303C12.3897 18.671 12.1989 18.75 12 18.75C11.8011 18.75 11.6103 18.671 11.4697 18.5303C11.329 18.3897 11.25 18.1989 11.25 18V12Z"
                          fill="#545454"/>
                    <path fill-rule="evenodd"
                          clip-rule="evenodd"
                          d="M12 22.5C14.7848 22.5 17.4555 21.3938 19.4246 19.4246C21.3938 17.4555 22.5 14.7848 22.5 12C22.5 9.21523 21.3938 6.54451 19.4246 4.57538C17.4555 2.60625 14.7848 1.5 12 1.5C9.21523 1.5 6.54451 2.60625 4.57538 4.57538C2.60625 6.54451 1.5 9.21523 1.5 12C1.5 14.7848 2.60625 17.4555 4.57538 19.4246C6.54451 21.3938 9.21523 22.5 12 22.5ZM12 24C15.1826 24 18.2348 22.7357 20.4853 20.4853C22.7357 18.2348 24 15.1826 24 12C24 8.8174 22.7357 5.76516 20.4853 3.51472C18.2348 1.26428 15.1826 0 12 0C8.8174 0 5.76516 1.26428 3.51472 3.51472C1.26428 5.76516 0 8.8174 0 12C0 15.1826 1.26428 18.2348 3.51472 20.4853C5.76516 22.7357 8.8174 24 12 24Z"
                          fill="#545454"/>
                </svg>
                <span>Новый адрес</span>
            </a>
        </div>
        <div class="cabinet-address-new">
            <form action="?"
                  class="cabinet-address-form form">
                <div class="cabinet-address-form-inputs">
                    <div class="cabinet-address-form-row flex-row">
                        <div class="cabinet-address-form-col flex-row-item">
                            <label class="form-block">
                                <span class="form-block-title">Название адреса (напр. Работа)</span>
                                <input type="text"
                                       class="input cabinet-address-input-title"
                                       required>
                            </label>
                        </div>
                        <div class="cabinet-address-form-col flex-row-item">
                            <div class="form-block">
                                <span class="form-block-title">Населённый пункт</span>
                                <div class="form-block-select ordering-delivery-city-select">
                                    <!--<input name="address"  type="search" class="input cabinet-address-input-city" required>-->
                                    <select  class="input cabinet-address-input-city" id="my_sity" style="width: 100%">

                                        <?
                                        $res = \Bitrix\Sale\Location\LocationTable::getList(array(
                                            'filter' => array('>=TYPE.ID' => '5', '<=TYPE.ID' => '6', '=NAME.LANGUAGE_ID' => LANGUAGE_ID),
                                            'select' => array('ID','NAME_RU' => 'NAME.NAME')
                                        ));

                                        while ($item = $res->fetch()) {
                                            $loc = getGroupsByLocation($item['ID']);
                                            $text = $loc;
                                            $region = $loc;

                                            unset($region[0],$region[1],$region[2]);
                                            unset($text[0],$text[1]);

                                            $text = implode(",", $text);
                                            $region = implode(",", $region);
                                            ?>
                                            <option value="<? print_r($loc[2]);?>" ind="<? print_r($loc[1]);?>" code="<? print_r($loc[0]);?>" region="<? print_r($region);?>">
                                                <? print_r($text); ?>
                                            </option>
                                        <?} ?>
                                    </select>

                                    <!-- ПОДКЛЮЧАЕМ ОФОРМЛЕНИЕ И JS ПЛАГИНА -->
                                    <link href="/local/templates/main/assets/select/select2.min.css" type="text/css" rel="stylesheet"/>
                                    <script type="text/javascript" src="/local/templates/main/assets/select/select2.full.min.js"></script>

                                    <!-- УКАЗЫВАЕМ ID НУЖНОГО SELECT-а -->
                                    <script>
                                        $(document).ready(function () {
                                            $("#my_sity").select2();
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="cabinet-address-form-col flex-row-item">
                            <label class="form-block">
                                <span class="form-block-title">Улица</span>
                                <input type="text"
                                       class="input cabinet-address-input-data"
                                       required>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="cabinet-address-form-inputs cabinet-address-form-inputs-small">
                    <div class="cabinet-address-form-row flex-row">
                        <div class="cabinet-address-form-col flex-row-item">
                            <label class="form-block">
                                <span class="form-block-title">Дом</span>
                                <input type="text"
                                       class="input cabinet-address-input-data"
                                       required>
                            </label>
                        </div>
                        <div class="cabinet-address-form-col flex-row-item">
                            <label class="form-block">
                                <span class="form-block-title">Корпус</span>
                                <input type="text"
                                       class="input cabinet-address-input-data">
                            </label>
                        </div>
                        <div class="cabinet-address-form-col flex-row-item">
                            <label class="form-block">
                                <span class="form-block-title">Строение</span>
                                <input type="text"
                                       class="input cabinet-address-input-data">
                            </label>
                        </div>
                        <div class="cabinet-address-form-col flex-row-item">
                            <label class="form-block">
                                <span class="form-block-title">Квартира</span>
                                <input type="text"
                                       class="input cabinet-address-input-data">
                            </label>
                        </div>
                    </div>
                </div>
                <label class="form-block">
                    <span class="form-block-title">Комментарий курьеру:</span>
                    <textarea
                        class="input textarea cabinet-address-input-comment"
                        placeholder="Напишите ваш комментарий"></textarea>
                </label>
                <div class="cabinet-address-form-submit-wrapp submit-wrapp">
                    <label class="checkbox-label  cabinet-address-form-main-checkbox">


                    </label>
                    <ul class="cabinet-address-form-btns">
                        <li>
                            <button class="btn btn-full btn-green submit">
                                Сохранить
                            </button>
                        </li>
                        <li>
                            <a href="#"
                               class="btn btn-full cabinet-address-form-del">Отменить</a>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
        <template
            id="cabinet-address-item">
            <div class="cabinet-address-item">
                <div class="cabinet-address-item-head">
                    <div class="cabinet-address-item-title"></div>
                    <div class="cabinet-address-item-city"></div>
                </div>
                <div class="cabinet-address-item-body">
                    <div class="cabinet-address-item-content">
                        <table class="cabinet-address-item-table">
                            <tr>
                                <td>
                                    Адрес
                                    получения:
                                </td>
                                <td class="cabinet-address-item-data"></td>
                            </tr>
                            <tr>
                                <td>
                                    Комментарий
                                    курьеру:
                                </td>
                                <td class="cabinet-address-item-comment"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="cabinet-address-form-submit-wrapp submit-wrapp">
                        <div class="btn cabinet-address-form-main-checkbox">
                            <i>
                                <svg width="16"
                                     height="16">
                                    <use xlink:href="#icon-star"/>
                                </svg>
                                <svg width="16"
                                     height="16">
                                    <use xlink:href="#icon-star-fill"/>
                                </svg>
                            </i>
                            <span>Главный адрес</span>
                        </div>
                        <ul class="cabinet-address-form-btns">
                            <li>
                                <a href="#"
                                   class="btn btn-full cabinet-address-item-edit">Редактировать</a>
                            </li>
                            <li>
                                <a href="#"
                                   class="btn btn-full cabinet-address-item-del">Удалить</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="cabinet-address-item-form"></div>
            </div>
        </template>
        <div class="cabinet-address-list"></div>
    </div>



<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>