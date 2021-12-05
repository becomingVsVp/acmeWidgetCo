<?php
include_once 'autoload.php';

use PHPUnit\Framework\TestCase;

class basketTest extends TestCase
{

    public function test__construct()
    {
        $gw = new gateway();
        $basket = new basket($gw);
        $this->assertEquals( 3, count($basket->products), 'for some reason there are not 3 widgets');
    }

    public function testAddProduct()
    {
        $gw = new gateway();
        $basket = new basket($gw);
        $this->assertEquals( 1, $basket->addProduct('R01'));
        $this->assertEquals( 1, $basket->addProduct('G01'));
        $this->assertEquals( 1, $basket->addProduct('B01'));
        $this->assertEquals( 2, $basket->addProduct('R01'));
        $this->assertEquals( 2, $basket->addProduct('B01'));
        $this->assertEquals( 3, $basket->addProduct('R01'));
    }

    public function testSubtotalOfProducts() {
        $gw = new gateway();
        $basket = new basket($gw);
        // force prices to known values
        $basket->products['R01']->price = 20;
        $basket->items['R01'] = 5;
        $this->assertEquals(100, $basket->subtotalOfProducts());
        $basket = new basket($gw);
        $this->assertEquals(0, $basket->subtotalOfProducts());
        $basket->addProduct('R01');
        $this->assertEquals( 3295, $basket->subtotalOfProducts());
        $basket->addProduct('G01');
        $this->assertEquals( 3295+2495, $basket->subtotalOfProducts());
        $basket->addProduct('B01');
        $this->assertEquals( 3295+2495+795, $basket->subtotalOfProducts());
    }

    public function testCalculateSubtotalsAndOffers() {
        $gw = new gateway();
        $basket = new basket($gw);
        $basket->addProduct('R01');
        // force prices to known values
        $basket->products['R01']->price = 20;
        $basket->items['R01'] = 5;
        $this->assertEquals(20, $basket->calculateSpecialOffers());
        $basket = new basket($gw);
        $basket->addProduct('R01');
        $this->assertEquals(495, $basket->calculateDeliveryCosts());
        $this->assertEquals(3295 + 495 , $basket->total());
        $this->assertEquals('$37.90', $basket->totalAsDollarsCents());
        $basket->addProduct('B01');
        $basket->addProduct('G01');
        $this->assertEquals(0, $basket->calculateSpecialOffers());
        $this->assertEquals(3295+2495+795 , $basket->subtotal());
        $this->assertEquals(295, $basket->calculateDeliveryCosts());
        $this->assertEquals(3295+2495+795 + 295 , $basket->total());
        $basket->addProduct('B01');
        $this->assertEquals(295, $basket->calculateDeliveryCosts());
        $this->assertEquals(3295+2495+795*2 + 295, $basket->total());
        $basket->addProduct('G01');
        $this->assertEquals(0, $basket->calculateSpecialOffers());
        $this->assertEquals(3295+2495*2+795*2 , $basket->subtotal());
        $this->assertEquals(3295+2495*2+795*2 + 0, $basket->total());
        $this->assertEquals(0, $basket->calculateDeliveryCosts());
        $basket->addProduct('R01');
        $this->assertEquals(round(3295/2), $basket->calculateSpecialOffers());
        $this->assertEquals(3295*2+2495*2+795*2 - round(3295/2), $basket->subtotal());
        $this->assertEquals(0, $basket->calculateDeliveryCosts());
        $this->assertEquals(3295*2+2495*2+795*2 - round(3295/2), $basket->total());
        $basket->addProduct('R01');
        $this->assertEquals(round(3295/2), $basket->calculateSpecialOffers());
        $this->assertEquals(3295*3+2495*2+795*2 - round(3295/2), $basket->subtotal());
        $this->assertEquals(0, $basket->calculateDeliveryCosts());
        $this->assertEquals(3295*3+2495*2+795*2 - round(3295/2), $basket->total());
        $basket->addProduct('R01');
        $this->assertEquals(round(3295/2)*2, $basket->calculateSpecialOffers());
        $this->assertEquals(3295*4+2495*2+795*2 - round(3295/2)*2, $basket->subtotal());
        $this->assertEquals(0, $basket->calculateDeliveryCosts());
        $this->assertEquals(3295*4+2495*2+795*2 - round(3295/2)*2, $basket->total());
    }

    public function testAcmeWidgetCoTest() {
        $gw = new gateway();
        $basket = new basket($gw);
        $basket->addProduct('B01');
        $basket->addProduct('G01');
        $this->assertEquals(3785, $basket->total());

        $basket = new basket($gw);
        $basket->addProduct('R01');
        $basket->addProduct('R01');
        $this->assertEquals( 5437, $basket->total());

        $basket = new basket($gw);
        $basket->addProduct('R01');
        $basket->addProduct('G01');
        $this->assertEquals( 6085, $basket->total());

        $basket = new basket($gw);
        $basket->addProduct('B01');
        $basket->addProduct('B01');
        $basket->addProduct('R01');
        $basket->addProduct('R01');
        $basket->addProduct('R01');
        $this->assertEquals( 9827, $basket->total());
    }
}
