<?php
include_once'autoload.php';

use PHPUnit\Framework\TestCase;

class widgetFactoryTest extends TestCase
{

    public function testLoadWidgets()
    {
        $gw = new gateway();

        self::assertEquals(3295, $gw->widgetData['R01'][gateway::WIDGET_PRICE]);
        self::assertEquals( 'Green Widget' , $gw->widgetData['G01'][gateway::WIDGET_PRODUCT]);
        self::assertEquals( 3, count($gw->widgetData));

        $testCode = 'test';
        $testProduct = 'product';
        $testPrice = 300;
        // mock data
        $gw->widgetData = [
            $testCode => [
                gateway::WIDGET_CODE => $testCode,
                gateway::WIDGET_PRODUCT => $testProduct,
                gateway::WIDGET_PRICE => $testPrice,
            ]
        ];
        $widgets = widgetFactory::loadWidgets($gw);
        $this->assertArrayHasKey($testCode, $widgets);
        $this->assertEquals($widgets[$testCode]->code, $testCode);
        $this->assertEquals($widgets[$testCode]->product, $testProduct);
        $this->assertEquals($widgets[$testCode]->price, $testPrice);
    }
}
