<?php

class testConfig
{
    public $var;
    public function __construct($var) {
        $this->var = $var;
    }
    public function test() {
        return $this->var;
    }
}