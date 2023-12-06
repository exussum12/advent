<?php

namespace exussum12\advent;
class Five
{
    public function process(string $file)
    {
        $lines = file($file);
        [,$seeds] = explode(': ', $lines[0]);
        $seeds = array_map('trim', explode(' ', $seeds));

        unset($lines[0]);
        $location = PHP_INT_MAX;
        foreach ($seeds as $seed) {
            $currentNumber = $seed;
            $found = false;
            foreach($lines as $line) {
                $parts = explode(' ', trim($line));
                if (count($parts) !== 3) {
                    $found = false;
                    continue;
                }
                if ($found) {
                    continue;
                }
                [$base, $start, $count] = $parts;
                if ($currentNumber >= $start && $currentNumber  <=  ($start + $count)) {
                    $found = true;
                    $base = (int) $base;
                    $currentNumber = $base + ($currentNumber - $start);
                }
            }
            $location = min($currentNumber, $location);
        }

        return $location;
    }
    public function moreSeeds(string $file)
    {
        $lines = file($file);
        [,$seedsMap] = explode(': ', $lines[0]);
        $seedsMap = array_map('trim', explode(' ', $seedsMap));
        $seedsMap = array_chunk($seedsMap, 2);

        unset($lines[0]);
        $location = PHP_INT_MAX;
        foreach ($seedsMap as $combo) {
            $seed = $combo[0];
            do {
                $currentNumber = $seed;
                $found = false;
                foreach ($lines as $line) {
                    $parts = explode(' ', trim($line));
                    if (count($parts) !== 3) {
                        $found = false;
                        continue;
                    }
                    if ($found) {
                        continue;
                    }
                    [$base, $start, $count] = $parts;
                    if ($currentNumber >= $start && $currentNumber <= ($start + $count)) {
                        $found = true;
                        $base = (int)$base;
                        $currentNumber = $base + ($currentNumber - $start);
                    }
                }
                $location = min($currentNumber, $location);
            } while(++$seed < ($combo[0] + $combo[1]));
        }

        return $location;
    }
}
