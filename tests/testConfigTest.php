<?php
include_once'autoload.php';
use PHPUnit\Framework\TestCase;

class testConfigTest extends TestCase
{
    public $myTest;
    public $myTestVar = 'hello from testConfig testing';
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->myTest = new testConfig($this->myTestVar);
    }

    public function testTest() {
        $this->assertEquals($this->myTestVar, $this->myTest->test());
    }
}
