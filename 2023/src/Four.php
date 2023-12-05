<?php

namespace exussum12\advent;

class Four
{
    public function process(string $file): int
    {
        $sum = 0;
        foreach(file($file) as $line) {
            $line = trim($line);
            [,$bothParts] = explode(':', $line);
            [$tickets, $winning] = explode('|', $bothParts);
            $ticketNumbers = array_filter(explode(' ', $tickets));
            $winningNumbers = array_filter(explode(' ', $winning));
            $both = array_intersect($ticketNumbers, $winningNumbers);
            if (count($both) > 0) {
                $sum += 2 ** (count($both) - 1);
            }
        }
        return $sum;
    }

    public function countCards(string $file): int
    {
        $sum = 0;
        $scores = [];
        foreach(file($file) as $lineNumber => $line) {
            $line = trim($line);
            [,$bothParts] = explode(':', $line);
            [$tickets, $winning] = explode('|', $bothParts);
            $ticketNumbers = array_filter(explode(' ', $tickets));
            $winningNumbers = array_filter(explode(' ', $winning));
            $both = array_intersect($ticketNumbers, $winningNumbers);
            $scores[$lineNumber] = count($both);
        }
        $cards = [];
        foreach($scores as $lineNumber => $score) {
            $cards[] = $lineNumber;
        }

        foreach($cards as &$cardNumber) {
            if ($scores[$cardNumber] === 0) {
                continue;
            }
            foreach (range(1, $scores[$cardNumber]) as $additionalCard) {
                $cards[] = $cardNumber + $additionalCard;
           }
        }

        return count($cards);
    }
}
