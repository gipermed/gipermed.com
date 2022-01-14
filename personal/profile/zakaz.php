<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetTitle("");
$APPLICATION->SetPageProperty('title', 'Лист ожидания');

global $USER;

Bitrix\Main\Loader::includeModule('sale');
Bitrix\Main\Loader::includeModule('catalog');
use Bitrix\Main\Loader;
Loader::includeModule("highloadblock");
use Bitrix\Highloadblock as HL;

$hlbl = 3; // Указываем ID нашего highloadblock блока к которому будет делать запросы.
$hlblock = HL\HighloadBlockTable::getById($hlbl)->fetch();

$entity = HL\HighloadBlockTable::compileEntity($hlblock);
$entity_data_class = $entity->getDataClass();

$rsData = $entity_data_class::getList(array(
    "select" => array("*"),
    "order" => array("ID" => "ASC"),
    "filter" => array("UF_ID_USER" => $USER->GetID(),"ID"=>$_POST["adrdost"])  // Задаем параметры фильтра выборки
));
$arData = $rsData->Fetch();

//CSaleBasket::GetBasketUserID()

$products = array(
   // array('PRODUCT_ID' => $_POST["id"], 'NAME' => $_POST["name"], 'PRICE' => $_POST["price"], 'CURRENCY' => 'RUB', 'QUANTITY' => $_POST["col"])
    //array('PRODUCT_ID' => 55549, 'NAME' => 'Товар 1', 'PRICE' => 500, 'CURRENCY' => 'RUB', 'QUANTITY' => 5)
);

//$basket = Bitrix\Sale\Basket::create(SITE_ID);
$basket = \Bitrix\Sale\Basket::loadItemsForFUser(CSaleBasket::GetBasketUserID(), SITE_ID);

//echo '<pre>';
//print_r($basket);
//echo '<pre>';

$result = \Bitrix\Sale\Delivery\Services\Table::getList(array(
    'filter' => array('ACTIVE'=>'Y'),
));

foreach ($products as $product)
{
    $item = $basket->createItem("catalog", $product["PRODUCT_ID"]);
    unset($product["PRODUCT_ID"]);
    $item->setFields($product);
}

$order = Bitrix\Sale\Order::create(SITE_ID, $USER->GetID());
$order->setPersonTypeId(1);
$order->setBasket($basket);

//$price = $order->getPrice();
//$cur = $order->getCurrency();

$propertyCollection = $order->getPropertyCollection();
//$adressPropertyCity = $propertyCollection->getAddress();
$adressProperty = $propertyCollection->getItemByOrderPropertyId(6);
$adressPropertyIndex = $propertyCollection->getItemByOrderPropertyId(9);
$adressPropertyCityCode = $propertyCollection->getItemByOrderPropertyId(4);

$adressProperty->setValue("ул: ".$arData['UF_STREET'].", дом: ".$arData['UF_HOME'].", кор: ".$arData['UF_KORPUS'].", стр: ".$arData['UF_STROENIE'].", кв: ".$arData['UF_KVARTIRA']);
$adressPropertyCityCode->setValue($arData['UF_CODE']);
$adressPropertyIndex->setValue($arData['UF_INDEX']);
//$adressPropertyCity->setValue($arData['UF_CITY']);

$shipmentCollection = $order->getShipmentCollection();
$shipment = $shipmentCollection->createItem(
    Bitrix\Sale\Delivery\Services\Manager::getObjectById($_POST["deliv"])
);
//$shipment->setBasePriceDelivery(887.48);
$shipmentItemCollection = $shipment->getShipmentItemCollection();

$price = $shipment->getPrice();

$arOrder = CSaleOrder::GetByID(53);
if (is_array($arOrder))
    echo $arOrder['COMMENTS'];

echo '<pre>';
print_r($arData);
echo '</pre>';

echo $price;

//echo \SaleFormatCurrency($price,$cur);

/** @var Sale\BasketItem $basketItem */

foreach ($basket as $basketItem)
{
    $item = $shipmentItemCollection->createItem($basketItem);
    $item->setQuantity($basketItem->getQuantity());
}
$paymentCollection = $order->getPaymentCollection();
$payment = $paymentCollection->createItem(
    Bitrix\Sale\PaySystem\Manager::getObjectById(1)
);
$payment->setField("SUM", $order->getPrice());
$payment->setField("CURRENCY", $order->getCurrency());

$result = $order->save();
if (!$result->isSuccess())
{
    //$result->getErrors();
}
?>