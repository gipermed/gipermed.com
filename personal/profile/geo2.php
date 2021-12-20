<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetTitle("");
$APPLICATION->SetPageProperty('title', 'Лист ожидания1');

//GLOBAL $USER;


Bitrix\Main\Loader::includeModule('sale');
Bitrix\Main\Loader::includeModule('catalog');

use Bitrix\Main\Loader;
use Bitrix\Highloadblock as HL;

Loader::includeModule("highloadblock");
$hlbl = 3; // Указываем ID нашего highloadblock блока к которому будет делать запросы.
$hlblock = HL\HighloadBlockTable::getById($hlbl)->fetch();

$entity = HL\HighloadBlockTable::compileEntity($hlblock);
$entity_data_class = $entity->getDataClass();

$rsData = $entity_data_class::getList(array(
    "select" => array("*"),
    "order" => array("ID" => "ASC"),
    "filter" => array("UF_ID_USER" => $USER->GetID())  // Задаем параметры фильтра выборки
));

//$rsData = $rsData->Fetch();

//echo "<pre>";
//print_r($rsData);
//echo "</pre>";


?><script src="/local/templates/main/assets/js/vendor/jquery.maskedinput.js"></script> <script>
        $('.check').click(sayHello);

        function sayHello() {

            alert('Код подтверждения: ' + getRandomIntInclusive());
            $('.check').css("display", "none");
            $('.check3').css("display", "block");
            $('#code').css("display", "block");

        }

        $('.check3').click(sayHello2);

        function sayHello2() {
            alert('Код принят');
            $('.check2').css("display", "none");
            $('#code').css("display", "none");
            $('.registr').css("display", "none")
            $('.dillev').css("display", "block");

        }

        $('.curradio').click(curradio);

        function curradio() {
            $('.curier').css("display", "block");
            $('.curnazv').css("display", "block");
        }

        $('.newadrradio').click(newadrradio);

        function newadrradio() {
            $('.newadr').css("display", "block");
            $('#select').css("display", "none");

        }

        $('.myadrradio').click(myadrradio);

        function myadrradio() {
            $('.newadr').css("display", "none");
            $('#select').css("display", "block");

        }



        $('.punktradio').click(punktradio);

        function punktradio() {
            $('.curier').css("display", "none");
            $('.curnazv').css("display", "none");
            $('.curieritog').css("display", "none");
        }

        $('.checkcur').click(btncheckcur);

        function btncheckcur() {
            var type = $('#select option:selected').html();
            var city = $('#select option:selected').attr('adr');
            $('.curieritog').css("display", "block");
            $('#adrtype').html(type);
            $('#city').html(city);
            $('.curier').css("display", "none");
            $('.nameuser').css("display", "block");
            $('.send').css("display", "block");
        }

        function getRandomIntInclusive() {
            min = Math.ceil(1000);
            max = Math.floor(9999);
            return Math.floor(Math.random() * (max - min + 1)) + min; //Максимум и минимум включаются
        }

        $(function ($) {
            $(".phone").mask("+7 (999) 999-9999");
        });

        $('.check3').click(function () {
            var getregion = $('#user-region').html();
            if (getregion != 'Москва и Московская область')
                $('.samoviviz').css("display", "none")

            // alert(getregion);
        });
    </script> <?
// Выведем актуальную корзину для текущего пользователя

$arBasketItems = array();

$dbBasketItems = CSaleBasket::GetList(
    array(
        "NAME" => "ASC",
        "ID" => "ASC"
    ),
    array(
        "FUSER_ID" => CSaleBasket::GetBasketUserID(),
        "LID" => SITE_ID,
        "ORDER_ID" => "NULL"
    ),
    false,
    false,
    array()
);
while ($arItems = $dbBasketItems->Fetch()) {
    if (strlen($arItems["CALLBACK_FUNC"]) > 0) {
        CSaleBasket::UpdatePrice($arItems["ID"],
            $arItems["CALLBACK_FUNC"],
            $arItems["MODULE"],
            $arItems["PRODUCT_ID"],
            $arItems["QUANTITY"]);
        $arItems = CSaleBasket::GetByID($arItems["ID"]);
    }

    $arBasketItems[] = $arItems;
}


// Печатаем массив, содержащий актуальную на текущий момент корзину
//echo "<pre>";
//print_r($arBasketItems);
//echo "</pre>";
?>
<div class="form-wrap">
	<div class="profile">
 <img src="https://html5book.ru/wp-content/uploads/2016/10/profile-image.png">
		<h1>Оформление заказа</h1>
	</div>
	<form method="post" action="zakaz.php">
		<div class="blok registr">
			<h4>1 Контактные данные</h4>
			<div class="tel">
				 Введите ваш номер телефона, чтобы мы могли сообщить вам о статусе заказа <input type="text" class="phone" placeholder="Телефон" required=""> <button type="button" class="check">Выслать код</button>
			</div>
			<div id="code" class="hidden">
 <input type="text" name="tel" placeholder="Код подтверждения" required=""> <button type="button" class="check3 ">Подтвердить</button>
			</div>
		</div>
		<div class="hidden dillev">
			<div class="blok">
				<h4>2 Доставка</h4>
				<p>
 <input class="curradio" name="deliv" type="radio" value="18"> Доставка курьером
				</p>
				<p>
 <input class="punktradio" name="deliv" type="radio" value="19"> Доставка до пункта выдачи заказов
				</p>
				<p class="samoviviz">
 <input name="deliv" type="radio" value="1"> Самовывоз
				</p>
				<p class=" curnazv hidden">
					 Доставка осуществляется на следующий день после оплаты
				</p>
				<div class="blok curier hidden">
					<h5>Получатель заказа</h5>
					<p>
						 Введите ФИО, чтобы курьер доставил товар именно вам
					</p>
					<p>
 <input type="text" name="fio" required="" placeholder="ФИО">
					</p>
					<h5>Адрес доставки</h5>
					<p>
 <input class="myadrradio" name="delivadr" type="radio" value="1" checked=""> Мои адреса
					</p>
					<p>
						<select id="select" name="adrdost">
                            <?foreach ($rsData as $arData)
                            {?>
							<option id="adrdost" adr="<?=$arData['UF_CITY'];?>" value="<?=$arData['ID'];?>"><?=$arData['ID'];?></option>
							 <?}?>
						</select>
					</p>
					<p>
 <input class="newadrradio" name="delivadr" type="radio" value="3"> Новый адрес
					</p>
					<div class=" newadr hidden">
						 <?$APPLICATION->IncludeComponent(
	"bitrix:sale.location.selector.search",
	"",
Array()
);?>
					</div>
 <button type="button" class=" checkcur ">
					Применить </button>
				</div>
                <div class="blok curieritog hidden">
					<h5>Получатель заказа</h5>
					<p id="adrtype">
					</p>
					<h5>Адрес доставки</h5>
					<p id="city">
					</p>
					<p>
						 Стоимость доставки
					</p>
					<p>
						 500 руб.
					</p>
				</div>
			</div>
		</div>
		 <!--   <div class="hidden nameuser">
            <div>
                <label for="name">ID товара</label>
                <input type="text" name="id" value="<? $arBasketItems[0]['PRODUCT_ID'] ?>" required>
            </div>
            <div>
                <label for="name">Наименование товара</label>
                <input type="text" name="name" required>
            </div>
            <div>
                <label for="name">Цена</label>
                <input type="text" name="price" required>
            </div>
            <div>
                <label for="name">Количество</label>
                <input type="text" name="col" required>
            </div>
            <div>
                <label for="email">E-mail</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label for="country">Страна</label>
                <select name="country">
                    <option>Выберите страну проживания</option>
                    <option value="Россия">Россия</option>
                    <option value="Украина">Украина</option>
                    <option value="Беларусь">Беларусь</option>
                </select>
                <div class="select-arrow"></div>
            </div>
        </div>--> <button class="hidden send" type="submit">Отправить</button>
	</form>
</div>
    <style>

        .form-wrap {
            /*  width: 550px;*/
            background: #ffd500;
            border-radius: 20px;
        }

        .form-wrap * {
            transition: .1s linear
        }

        .profile {
            width: 240px;
            float: left;
            text-align: center;
            padding: 30px;
        }

        .form-wrap form {
            background: white;
            float: left;
            width: calc(100% - 240px);
            padding: 30px;
            border-radius: 0 20px 20px 0;
            color: #7b7b7b;
        }

        .form-wrap:after, form div:after {
            content: "";
            display: table;
            clear: both;
        }

        form div {
            margin-bottom: 15px;
            position: relative;
        }

        h1 {
            font-size: 24px;
            font-weight: 400;
            position: relative;
            margin-top: 50px;
        }

        h1:after {
            content: "\f138";
            font-size: 40px;
            font-family: FontAwesome;
            position: absolute;
            top: 50px;
            left: 50%;
            transform: translateX(-50%);
        }

        /********************** стилизация элементов формы **********************/

        input[type="text"], input[type="email"] {
            border-width: 0;
            outline: none;
            margin: 0;
            width: 100%;
            padding: 10px 15px;
            background: #e6e6e6;
        }

        input[type="text"]:focus, input[type="email"]:focus {
            box-shadow: inset 0 0 0 2px rgba(0, 0, 0, .2);
        }

        .radio label {
            position: relative;
            padding-left: 50px;
            cursor: pointer;
            width: 50%;
            float: left;
            line-height: 40px;
        }

        .radio input {
            position: absolute;
            opacity: 0;
        }

        .radio-control {
            position: absolute;
            top: 0;
            left: 0;
            height: 40px;
            width: 40px;
            background: #e6e6e6;
            border-radius: 50%;
            text-align: center;
        }

        .male:before {
            content: "\f222";
            font-family: FontAwesome;
            font-weight: bold;
        }

        .female:before {
            content: "\f221";
            font-family: FontAwesome;
            font-weight: bold;
        }

        .radio label:hover input ~ .radio-control,
        .radiol input:focus ~ .radio-control {
            box-shadow: inset 0 0 0 2px rgba(0, 0, 0, .2);
        }

        .radio input:checked ~ .radio-control {
            color: red;
        }

        select {
            width: 100%;
            cursor: pointer;
            padding: 10px 15px;
            outline: 0;
            border: 0;
            background: #e6e6e6;
            color: #7b7b7b;
            -webkit-appearance: none; /*убираем галочку в webkit-браузерах*/
            -moz-appearance: none; /*убираем галочку в Mozilla Firefox*/
        }

        select::-ms-expand {
            display: none; /*убираем галочку в IE*/
        }

        .select-arrow {
            position: absolute;
            top: 38px;
            right: 15px;
            width: 0;
            height: 0;
            pointer-events: none; /*активизируем показ списка при нажатии на стрелку*/
            border-style: solid;
            border-width: 8px 5px 0 5px;
            border-color: #7b7b7b transparent transparent transparent;
        }

        .form-wrap button {
            padding: 10px 0;
            border-width: 0;
            /*display: block;*/
            width: 120px;
            margin: 25px auto 0;
            background: #60e6c5;
            color: white;
            font-size: 14px;
            outline: none;
            text-transform: uppercase;
        }

        .hidden {
            display: none;
        }

        .blok {
            border: solid 1px #E2E2E2;
            padding: 20px;
        }

        /********************** добавляем форме адаптивность **********************/
        @media (max-width: 600px) {
            .form-wrap {
                margin: 20px auto;
                max-width: 550px;
                width: 100%;
            }

            .profile, form {
                float: none;
                width: 100%;
            }

            h1 {
                margin-top: auto;
                padding-bottom: 50px;
            }

            form {
                border-radius: 0 0 20px 20px;
            }
        }
    </style><?$APPLICATION->IncludeComponent(
	"ipol:ipol.sdekPickup",
	"",
Array()
);?><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>