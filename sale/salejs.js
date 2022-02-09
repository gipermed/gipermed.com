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
    $('.fio').css("display", "block");
    $('.punkt').css("display", "none");
    $('.samovivoz').css("display", "none");
    $('.fioinput').prop('required', true);
}

$('.samradio').click(samradio);

function samradio() {
    $('.samovivoz').css("display", "block");
    $('.punkt').css("display", "none");
    $('.curier').css("display", "none");
    $('.curieritog').css("display", "none");

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
    $('.curieritog').css("display", "none");
    $('.samovivoz').css("display", "none");
    $('.punkt').css("display", "block");
    $('.fio').css("display", "block");
    $('.fioinput').prop('required', true);
}

$('.checkcur').click(btncheckcur);

function btncheckcur() {

    var city;

    if($('input[name="delivadr"]:checked').val() == 1)
    {
        city = $('.select option:selected').attr('adr');
    }
    else {
        city = $('.select2 option:selected').attr('adr');
    }
    getPrice(city);
    $('.curieritog').css("display", "block");
    $('#city').html(city);
    $('.curier').css("display", "none");
    $('.nameuser').css("display", "block");
    $('.send').css("display", "block");
}

$('.samradio').click(btnchecksamradio);

function btnchecksamradio() {
    $('.send').css("display", "block");
    $('.fio').css("display", "none");
    $('.fioinput').prop('required', false);
}

function getRandomIntInclusive() {
    min = Math.ceil(1000);
    max = Math.floor(9999);
    return Math.floor(Math.random() * (max - min + 1)) + min; //Максимум и минимум включаются
}

$('.check3 ').click(getRegionDev);
function getRegionDev() {
    var getregion = sessionStorage.getItem('region');
    var getcity = sessionStorage.getItem('city');
    if (getregion.includes("Московская область")
        || getregion.includes("Москва")
    )
        $('.samoviviz').css("display", "block")
    else $('.samoviviz').css("display", "none")
    getPrice(getcity);
}

function getPrice(city){

    new ISDEKWidjet({
        defaultCity: city,
        cityFrom: 'Москва',
        country: 'Россия',
        link: true,
        onCalculate: function(wat){

            $("#SDEK_cPrice2").text(wat.profiles.courier.price);
            $("#SDEK_cPrice").text(wat.profiles.pickup.price);
            $("#SDEK_cPrice3").text(wat.profiles.courier.price);
        }
    });
}
$(function ($) {
    $(".phone").mask("+7 (999) 999-9999");
});

$(document).ready(function () {
    $('.cabinet-address-input-city2').select2();
});

var widjet = new ISDEKWidjet({
    showWarns: true,
    showErrors: true,
    showLogs: true,
    hideMessages: false,
    choose: true,
    popup: true,
    country: 'Россия',
    defaultCity: sessionStorage.getItem('city'),
    cityFrom: 'Москва',
    link: false,
    hidedress: true,
    hidecash: true,
    hidedelt: true,
    detailAddress: false,
    region: true,
    apikey: '46344e7f-174a-4277-9173-24551c3e5250',
    goods: [{
        length: 40,
        width: 30,
        height: 20,
        weight: 1
    }],
    onChoose: onChoose,
    onReady : function(){ // на загрузку виджета отобразим информацию о доставке до ПВЗ
        ipjq('#linkForWidjet').css('display','inline');
        $('.send').css("display", "block");
    },
});
function onChoose (info){ // при выборе ПВЗ: запишем информацию в текстовые поля
    ipjq('[name="chosenPost"]').val(info.id);
    ipjq('[name="cityPost"]').val(info.cityName);
    ipjq('[name="cityIdPost"]').val(info.city);
    ipjq('[name="addresPost"]').val(info.PVZ.Address);
    ipjq('[name="pricePost"]').val(info.price);
    ipjq('[name="timePost"]').val(info.term);
    ipjq('[name="tarifPost"]').val(info.tarif);

    widjet.close(); // закроем виджет
}