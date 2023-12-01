<?php

namespace exussum12\advent;
class One
{
    private $replacements = [
        'one' => 1,
        'two' => 2,
        'three' => 3,
        'four' => 4,
        'five' => 5,
        'six' => 6,
        'seven' => 7,
        'eight' => 8,
        'nine' => 9,
    ];
    private $preReplace = [
        'oneight' => 18,
        'twone' => 21,
        'threeight' => 38,
        'fiveight' => 58,
        'sevenine' => 79,
        'eightwo' => 82,
        'eighthree' => 83,
        'nineight' => 98,
    ];

    public function calculate(string $file): int
    {
        $sum = 0;
        foreach(file($file) as $line) {
            $sum = $this->extractSum($line, $sum);
        }

        return $sum;
    }

    public function calculateWords(string $file): int
    {
        $sum = 0;
        foreach(file($file) as $line) {
            $line = str_ireplace(array_keys($this->preReplace), $this->preReplace, $line);
            $line = str_ireplace(array_keys($this->replacements), $this->replacements, $line);
            $sum = $this->extractSum($line, $sum);
        }

        return $sum;
    }

    private function extractSum(string $line, int $sum): int
    {
        $matches = [];
        preg_match('/([0-9]).*([0-9])|([0-9])/', $line, $matches);
        if ($matches[1]) {
            $sum += (int)($matches[1] . $matches[2]);
        }
        if (!empty($matches[3])) {
            $sum += (int)($matches[3] . $matches[3]);
        }
        return $sum;
    }
}
