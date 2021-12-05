<?php
include_once 'autoload.php';
class specialOffers
{
    const SPECIAL_BOGOHALF = 'BOGOHALF';
    /** @var gateway $gw */
    public $gw;

    public function __construct(gateway $gw) {
        $this->gw = $gw;
    }

    public function calculateSpecialOffers(widget $widget, $quantity) {
        $discount = 0;
        foreach ($this->gw->specialOffersData as $key => $datum ) {
            if ($key === self::SPECIAL_BOGOHALF && $datum[gateway::SPECIAL_WIDGET_CODE] === $widget->code) {
                // every second item is half price
                if ($quantity >= 2) {
                    // there is no special if less than two items have been selected
                    for ($i = 2; $i <= $quantity; $i = $i + 2) {
                        $discount += Round(($widget->price / 2),0);
                    }
                }
                return (int)$discount;
            }
        }
        return (int)$discount;
    }
}