<?php

namespace exussum12\advent;

class Two
{
    public function process($file)
    {
        $sum = 0;
        foreach(file($file) as $line) {
            $max = $this->calculateLine($line);
            $sum += $max['red'] * $max['blue'] * $max['green'];
        }

        return $sum;
    }

    private function calculateLine(mixed $line)
    {
        $max = [
            'red' => 0,
            'green' => 0,
            'blue' => 0,
        ];
        $lines = explode(';', explode(':', $line)[1]);
        foreach($lines as $input) {
            $parts = explode(',', $input);
            foreach ($parts as $part) {
                [$number, $colour] = explode(' ', trim($part));
                $max[$colour] = max($number, $max[$colour]);
            }
        }
        return $max;
    }

}
