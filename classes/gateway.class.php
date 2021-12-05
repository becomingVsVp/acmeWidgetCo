<?php
include_once'autoload.php';

class gateway
{
    const WIDGET_CODE = 'code';
    const WIDGET_PRODUCT = 'product';
    const WIDGET_PRICE = 'price';

    const SPECIAL_CODE = 'code';
    const SPECIAL_WIDGET_CODE = 'widgetCode';
    const SPECIAL_OFFER_TEXT = 'offerText';

    const DELIVERY_BASKET_LOWER_LIMIT = 'basketLowerLimit';
    const DELIVERY_DELIVERY_COST = 'deliveryCost';

    public $widgetData;
    public $specialOffersData;
    public $deliveryCostData;

    public function __construct() {
        $this->widgetData = $this->loadWidgetData();
        $this->specialOffersData = $this->loadSpecialOffersData();
        $this->deliveryCostData = $this->loadDeliveryCostData();
    }

    public function loadWidgetData() {
        return [
            'R01' => [
                self::WIDGET_CODE => 'R01',
                self::WIDGET_PRODUCT => 'Red Widget',
                self::WIDGET_PRICE => 3295,
            ],
            'G01' => [
                self::WIDGET_CODE => 'G01',
                self::WIDGET_PRODUCT => 'Green Widget',
                self::WIDGET_PRICE => 2495,
            ],
            'B01' => [
                self::WIDGET_CODE => 'B01',
                self::WIDGET_PRODUCT => 'Blue Widget',
                self::WIDGET_PRICE => 795,
            ]
        ];
    }

    public function loadSpecialOffersData() {
        return [
            specialOffers::SPECIAL_BOGOHALF =>
                [
                    self::SPECIAL_CODE => specialOffers::SPECIAL_BOGOHALF,
                    self::SPECIAL_WIDGET_CODE => 'R01',
                    self::SPECIAL_OFFER_TEXT => 'Buy one red widget, get the second half price',
                ]
        ];
    }

    public function loadDeliveryCostData() {
        return [
            0 => [
                self::DELIVERY_BASKET_LOWER_LIMIT => 9000,
                self::DELIVERY_DELIVERY_COST => 0,
            ],
            1 => [
                self::DELIVERY_BASKET_LOWER_LIMIT => 5000,
                self::DELIVERY_DELIVERY_COST => 295,
            ],
            2 => [
                self::DELIVERY_BASKET_LOWER_LIMIT => 0,
                self::DELIVERY_DELIVERY_COST => 495,
            ],
        ];
    }
}