<?php

use exussum12\advent\Four;
use exussum12\advent\Three;
use exussum12\advent\Two;
use PHPUnit\Framework\TestCase;

class FourTest extends TestCase
{

    public function testPartOne()
    {
        $four = new Four();
        $this->assertEquals(13, $four->process(__DIR__ . '/assets/four'));
    }
    public function testPartTwo()
    {
        $four = new Four();
        $this->assertEquals(30, $four->countCards(__DIR__ . '/assets/four'));
    }
}
