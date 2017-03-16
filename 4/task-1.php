<?php
$xmlpath = './data.xml';
$xml = simplexml_load_file($xmlpath);
$attr = $xml->attributes();
$dom = new DOMDocument('1.0', 'UTF-8');
$purchase = $dom->createElement('div', 'Заказ №: '. $attr['PurchaseOrderNumber']);
$purchaseDate = $dom->createElement('div', 'От '. $attr['OrderDate']);
$purchase->appendChild($purchaseDate);
foreach ($xml as $key=>$value) {

    if ($value->attributes()) {
        $attrs = $value->attributes();
        $deliveryType = $dom->createElement('div', 'Тип доставки: '.$attrs);
        $purchase->appendChild($deliveryType);
    }
    switch ($key) {
        case 'Address':
            $name = $dom->createElement('div', ' - Имя: '.$value->Name);
            $address = $dom->createElement('div', 'Получатель: ');
            $country = $dom->createElement('div', ' - Страна: '.$value->Country);
            $state = $dom->createElement('div', ' - Штат: '.$value->State);
            $city = $dom->createElement('div', ' - Город: '.$value->City);
            $street = $dom->createElement('div', ' - Улица: '.$value->Street);
            $zip = $dom->createElement('div', ' - Почтовый индекс: '.$value->Zip);
            $purchase->appendChild($address);
            $address->appendChild($name);
            $address->appendChild($country);
            $address->appendChild($state);
            $address->appendChild($city);
            $address->appendChild($street);
            $address->appendChild($zip);

        case 'Items':
            foreach ($value->Item as $item) {
                $attr = $item->attributes();
                $good = $dom->createElement('div','======' . 'ТОВАР: '.$attr);
                $product = $dom->createElement('div', ' - Наименование: '.$item->ProductName);
                $quantity = $dom->createElement('div', ' - Количество: '.$item->Quantity);
                $price = $dom->createElement('div', ' - Цена в USD: '.$item->USPrice);
                $good->appendChild($product);
                $good->appendChild($quantity);
                $good->appendChild($price);
                if (!empty($item->Comment)) {
                    $comment = $dom->createElement('div', ' - Комментарий: '.$item->Comment);
                    $good->appendChild($comment);
                }
                if (!empty($item->ShipDate)) {
                    $date = $dom->createElement('div', ' - Дата отгрузки: '.$item->ShipDate);
                    $good->appendChild($date);
                }
                $purchase->appendChild($good);
            }
    }
}
$dom->appendChild($purchase);
echo $dom->saveHTML();