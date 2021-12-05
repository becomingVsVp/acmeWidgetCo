<?php
include_once 'autoload.php';

use PHPUnit\Framework\TestCase;

class deliveryCostTest extends TestCase
{

    public function test__construct()
    {
        $gw = new gateway();
        $delivery = new deliveryCost( $gw );
        $this->assertSame($delivery->gw, $gw);
    }

    public function testCalculateDeliveryCost()
    {
        $gw = new gateway();
        // have to have at least one delivery charge
        $this->assertGreaterThanOrEqual(1, $gw->deliveryCostData, 'For some reason there is no data in delivery costs array');
        $delivery = new deliveryCost($gw);
        $testSet = [
            '0' => 495,
            '1000' => 495,
            '4999' => 495,
            '5000' => 295,
            '6000' => 295,
            '8999' => 295,
            '9000' => 0,
            '10000' => 0
        ];
        foreach ($testSet as $spending => $deliveryCost) {
            $this->assertEquals($deliveryCost, $delivery->calculateDeliveryCost( (int)$spending), "This one is not right {$spending}");
        }
        $baseCost = 10000;
        $gw->deliveryCostData = [
            [
                gateway::DELIVERY_DELIVERY_COST => $baseCost,
                gateway::DELIVERY_BASKET_LOWER_LIMIT => 1000
            ]
        ];
        $delivery = new deliveryCost($gw);
        $this->assertEquals($delivery->baseDeliveryCost, $baseCost);
    }
}
