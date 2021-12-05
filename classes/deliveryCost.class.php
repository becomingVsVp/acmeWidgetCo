<?php

class deliveryCost
{
    public $gw;
    public $baseDeliveryCost = 0;

    public function __construct(gateway $gw) {
        $this->gw = $gw;
        // the last array element has the base delivery cost
        $this->baseDeliveryCost = end( $gw->deliveryCostData )[gateway::DELIVERY_DELIVERY_COST];
    }

    public function calculateDeliveryCost( $spending ) {
        if ($spending <= 1) {
            return 0;
        }
        foreach ($this->gw->loadDeliveryCostData() as $datum) {
            if ($spending >= $datum[gateway::DELIVERY_BASKET_LOWER_LIMIT]) {
                return $datum[gateway::DELIVERY_DELIVERY_COST];
            }
        }
        return $this->baseDeliveryCost;
    }
}