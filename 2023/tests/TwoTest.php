<?php


use exussum12\advent\Two;
use PHPUnit\Framework\TestCase;

class TwoTest extends TestCase
{

    public function testProcess()
    {
        $two = new Two();
        $this->assertEquals(2286, $two->process(__DIR__ . '/assets/two'));
    }
}
