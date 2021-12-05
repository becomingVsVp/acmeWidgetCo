<?php
include_once 'autoload.php';

use PHPUnit\Framework\TestCase;

class specialOffersTest extends TestCase
{

    public function testCalculateSpecialOffers()
    {
        $gw = new gateway();
        $this->assertEquals($gw->specialOffersData[specialOffers::SPECIAL_BOGOHALF][gateway::SPECIAL_CODE], specialOffers::SPECIAL_BOGOHALF, 'somehow we lost our one special offer bogohalf');
        // lets test our own widget
        $widget = new widget('R01','fake widget', 4);
        // will be in format
        //  quantity => discountShouldBe
        $testCalc = [
            '1' => 0,
            '2' => 2,
            '3' => 2,
            '4' => 4,
            '7' => 6,
            '8' => 8
        ];
        $offer = new specialOffers($gw);
        foreach ($testCalc as $qty => $discount) {
            $calcDiscount = $offer->calculateSpecialOffers( $widget, (int)$qty);
            $this->assertEquals( $discount, $calcDiscount, "Problems with fake widget qty {$qty}");
        }
        $widgets = widgetFactory::loadWidgets($gw);
        $calcDiscount = $offer->calculateSpecialOffers( $widgets['R01'], 1);
        $this->assertEquals( $calcDiscount, 0 );
        $calcDiscount = $offer->calculateSpecialOffers( $widgets['R01'], 2);
        $this->assertEquals( $calcDiscount, Round($widgets['R01']->price / 2));
        // green widget has no special offers
        $calcDiscount = $offer->calculateSpecialOffers( $widgets['G01'], 7);
        $this->assertEquals( $calcDiscount, 0);
    }
}
