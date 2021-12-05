<?php
include_once'autoload.php';

class basket
{
    public $gw;
    public $products = [];
    public $items = [];

    public function __construct( $gw ) {
        $this->gw = $gw;
        $this->products = widgetFactory::loadWidgets($this->gw);
    }

    /**
     * @param $productId
     * @return int
     */
    public function addProduct($productId) {
        $qty = 0;
        if (isset($this->products[$productId]) && $this->products[$productId] instanceof widget) {
            // if product is already in basket, get quantity
            if (isset($this->items[$productId])) {
                $qty = (int)$this->items[$productId];
            }
            // store it
            $qty++;
            $this->items[$productId] = $qty;
        }
        return $qty;
    }

    public function subtotalOfProducts() {
        $subtotal = 0;
        foreach ($this->items as $item => $quantity) {
            $subtotal += (int)$this->products[$item]->price * $quantity;
        }
        return $subtotal;
    }

    public function calculateSpecialOffers() {
        $offer = new specialOffers($this->gw);
        $discount = 0;
        foreach ($this->products as $widget) {
            if (isset($this->items[$widget->code])) {
                $discount += (int)$offer->calculateSpecialOffers($widget, $this->items[$widget->code]);
            }
        }
        return (int)$discount;
    }

    public function subtotal() {
        return (int)$this->subtotalOfProducts() - (int)$this->calculateSpecialOffers();
    }

    public function calculateDeliveryCosts() {
        $dc = new deliveryCost($this->gw);
        return (int)$dc->calculateDeliveryCost( $this->subtotal() );
    }

    public function total() {
        return (int)$this->subtotal() + (int)$this->calculateDeliveryCosts();
    }

    public function totalAsDollarsCents() {
        return '$' . number_format($this->total() / 100, 2);
    }
}