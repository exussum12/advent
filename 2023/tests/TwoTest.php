<?php


use exussum12\advent\Two;
use PHPUnit\Framework\TestCase;

class TwoTest extends TestCase
{

    public function testProcess()
    {
        $one = new Two();
        $this->assertEquals(2286, $one->process(__DIR__ . '/../assets/two'));
    }
}
