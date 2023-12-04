<?php

namespace exussum12\advent;

class Three
{
    public function process(string $file): int
    {
        $offsets = [];
        foreach(file($file) as $lineNumber => $line) {
            $matches = [];
            $matched = preg_match_all('/[^0-9.]/', trim($line), $matches, PREG_OFFSET_CAPTURE);
            if ($matched) {
                foreach($matches[0] as $match) {
                    $columnNumber = $match[1];
                    foreach (range(-1, 1) as $rowOffset) {
                        foreach (range(-1, 1) as $columnOffset) {
                            $offsets[$lineNumber + $rowOffset][$columnNumber + $columnOffset] = true;
                        }
                    }
                }
            }
        }

        $sum = 0;
        foreach(file($file) as $lineNumber => $line) {
            $matches = [];
            $matched = preg_match_all('/[0-9]+/', trim($line), $matches, PREG_OFFSET_CAPTURE);
            if ($matched) {
                foreach ($matches[0] as $match) {
                    foreach(range(0, strlen($match[0]) -1) as $length) {
                        if (isset($offsets[$lineNumber][$match[1] + $length])) {
                            $sum += $match[0];
                            continue 2;
                        }
                    }
                }
            }
        }

        return $sum;
    }
    public function gears(string $file): int
    {
        $offsets = [];
        $gear = 0;
        $lines = file($file);
        $sum = 0;
        foreach($lines as $lineNumber => $line) {
            $matches = [];
            $matched = preg_match_all('/[*]/', trim($line), $matches, PREG_OFFSET_CAPTURE);
            if ($matched) {
                foreach($matches[0] as $match) {
                    $columnNumber = $match[1];
                    $found = [];
                    foreach (range(-1, 1) as $rowOffset) {
                        $numbers = [];
                        preg_match_all('/[0-9]+/', $lines[$lineNumber + $rowOffset], $numbers, PREG_OFFSET_CAPTURE);
                        foreach($numbers[0] ?? [] as $matchedNumber) {
                            if (
                                ($columnNumber - 1) <= ($matchedNumber[1] + (strlen($matchedNumber[0]) -1)) &&
                                ($columnNumber + 1) >= ($matchedNumber[1])
                            ) {
                                $found[] = $matchedNumber[0];
                            }
                        }
                    }
                    if (count($found) == 2) {
                        $sum += array_product($found);
                    }
                }
            }
        }

        return $sum;
    }
}
