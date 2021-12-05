<?php
include_once'autoload.php';

use PHPUnit\Framework\TestCase;

class widgetTest extends TestCase
{

    public function test__construct()
    {
        $code = 'one';
        $product = 'two';
        $price = 100;
        $wid = new widget($code, $product, $price);
        $this->assertEquals($code, $wid->code);
        $this->assertEquals($product, $wid->product);
        $this->assertEquals($price, $wid->price);
    }
}
