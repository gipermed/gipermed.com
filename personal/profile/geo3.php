<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Пример работы виджета ПВЗ</title>
    <script type="text/javascript" src="https://t.gipermed.com/local/components/sdek/widjet.js" id="ISDEKscript" ></script>
</head>
<body>
<p>Виджет для оформления заказа</p>
<script type="text/javascript">

    var widjet = new ISDEKWidjet({
        defaultCity: 'Королев',
        cityFrom: 'Москва',
        link: 'forpvz',
        path: 'https://widget.cdek.ru/widget/scripts/',
        servicepath: 'https://t.gipermed.com/service.php' //ссылка на файл service.php на вашем сайте
    });

</script>

<div id="forpvz" style="width:100%; height:600px;"></div>
</body>
</html>