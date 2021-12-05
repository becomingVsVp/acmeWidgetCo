<?php
include_once 'autoload.php';
$cli = false;
if (php_sapi_name() === 'cli') {
    $cli = true;
    $_GET['Products'] = "B01,G01";
}
$eol = (new eolCharacter($cli))->eol;
if (!$cli) echo "Server: {$_SERVER['HTTP_HOST']}"  . $eol . $eol;

// get product from url
if (!isset($_GET['Products'])) {
    echo 'ERROR: User has entered incorrect information. querystring must include "Products=" and comma-delimited products which include "R01", "G01", or "B01"' . $eol;
    echo 'For example: <a href="index.php?Products=G01,B01">/?Products=G01,B01' . $eol;
    die;
}
$gw = new gateway();
$basket = new basket($gw);
$products = explode(',',$_GET['Products']);
foreach ($products as $product) {
    echo "Product: {$product} " . $eol;
    $basket->addProduct($product);
}
echo $eol;
if (!$cli) echo '<hr/>';
echo "Total: {$basket->totalAsDollarsCents()}" . $eol;
