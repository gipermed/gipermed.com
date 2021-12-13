<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetTitle("");
$APPLICATION->SetPageProperty('title', 'Лист ожидания');


Bitrix\Main\Loader::includeModule('sale');
Bitrix\Main\Loader::includeModule('catalog');


$products = array(
    array('PRODUCT_ID' => $_POST["id"], 'NAME' => $_POST["name"], 'PRICE' => $_POST["price"], 'CURRENCY' => 'RUB', 'QUANTITY' => $_POST["col"])
    //array('PRODUCT_ID' => 1811, 'NAME' => 'Товар 1', 'PRICE' => 500, 'CURRENCY' => 'RUB', 'QUANTITY' => 5)
);

$basket = Bitrix\Sale\Basket::create(SITE_ID);

foreach ($products as $product)
{
    $item = $basket->createItem("catalog", $product["PRODUCT_ID"]);
    unset($product["PRODUCT_ID"]);
    $item->setFields($product);
}

$order = Bitrix\Sale\Order::create(SITE_ID, 1);
$order->setPersonTypeId(1);
$order->setBasket($basket);

$shipmentCollection = $order->getShipmentCollection();
$shipment = $shipmentCollection->createItem(
    Bitrix\Sale\Delivery\Services\Manager::getObjectById(1)
);

$shipmentItemCollection = $shipment->getShipmentItemCollection();

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