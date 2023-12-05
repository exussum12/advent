<?php

use exussum12\advent\Three;
use exussum12\advent\Two;
use PHPUnit\Framework\TestCase;

class ThreeTest extends TestCase
{

    public function testPartOne()
    {
        $three = new Three();
        $this->assertEquals(4361, $three->process(__DIR__ . '/assets/three'));
    }

    public function testPartTwo()
    {
        $three = new Three();
        $this->assertEquals(467835, $three->gears(__DIR__ . '/assets/three'));
    }

}
