<?php
include_once'autoload.php';
class widget
{
    public $code;
    public $product;
    public $price;

    public function __construct($code, $product, $price) {
        $this->code = $code;
        $this->product = $product;
        $this->price = $price;
    }
}