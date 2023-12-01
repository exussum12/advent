<?php

use PHPUnit\Framework\TestCase;
use exussum12\advent\One;

class OneTest extends TestCase
{
    public function testDayOne()
    {
        $one = new One();
        $this->assertEquals(142, $one->calculate(__DIR__ . '/assets/one'));
    }
    public function testDayOnePart2()
    {
        $one = new One();
        $this->assertEquals(281, $one->calculateWords(__DIR__ . '/assets/one-part2'));
    }
}
