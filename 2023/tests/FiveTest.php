<?php

use exussum12\advent\Five;
use PHPUnit\Framework\TestCase;

class FiveTest extends TestCase
{

    public function testPartOne()
    {
        $five = new Five();
        $this->assertEquals(35, $five->process(__DIR__ . '/assets/five'));
    }
    public function testPartTwo()
    {
        $five = new Five();
        $this->assertEquals(46, $five->moreSeeds(__DIR__ . '/assets/five'));
    }
}
