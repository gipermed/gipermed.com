<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetTitle("");
$APPLICATION->SetPageProperty('title', 'Лист ожидания');

Bitrix\Main\Loader::includeModule('sale');
Bitrix\Main\Loader::includeModule('catalog');
?>

    <script>
        $('.check').click( sayHello );
        function sayHello() {

            alert('Код подтверждения: ' + getRandomIntInclusive());
            $('.check').css("display", "none");
            $('.check2').css("display", "block");
            $('#code').css("display", "block");

        }

        function getRandomIntInclusive() {
            min = Math.ceil(1000);
            max = Math.floor(9999);
            return Math.floor(Math.random() * (max - min + 1)) + min; //Максимум и минимум включаются
        }


    </script>

<div class="form-wrap">
  <div class="profile"><img src="https://html5book.ru/wp-content/uploads/2016/10/profile-image.png">
    <h1>Оформление заказа</h1>
  </div>
  <form method="post" action="zakaz.php">

      <div>Введите ваш номер телефона, чтобы мы могли сообщить вам о статусе заказа</div>
      <div>
          <label for="phone"></label>
          <input type="tel" id="phone" name="phone"
                 pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                 required placeholder =  "Телефон">
          <small>Format: 123-456-7890</small>
      </div>

      <div id="code">
          <input type="text" name="tel" placeholder =  "Код подтверждения" required >
      </div>
      <button class="check btn btn-full btn-green submit">
          Выслать код подтверждения
      </button>
    <div class="check2" >
      <button class=" btn btn-full btn-green submit">
          Подтвердить
      </button>
    </div>
      <div>
          <label for="name">ID товара</label>
          <input type="text" name="id" required>
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
    <button type="submit">Отправить</button>
  </form>
</div>



<style>

    .form-wrap {
        width: 550px;
        background: #ffd500;
        border-radius: 20px;
    }
    .form-wrap *{transition: .1s linear}
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
        box-shadow: inset 0 0 0 2px rgba(0,0,0,.2);
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
        box-shadow: inset 0 0 0 2px rgba(0,0,0,.2);
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
        display: block;
        width: 120px;
        margin: 25px auto 0;
        background: #60e6c5;
        color: white;
        font-size: 14px;
        outline: none;
        text-transform: uppercase;
    }

    #code{
        display: none;
    }

    .check2 {
        display: none;
    }

    /********************** добавляем форме адаптивность **********************/
    @media (max-width: 600px) {
        .form-wrap {margin: 20px auto; max-width: 550px; width:100%;}
        .profile, form {float: none; width: 100%;}
        h1 {margin-top: auto; padding-bottom: 50px;}
        form {border-radius: 0 0 20px 20px;}
    }
</style>


<?require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");?>