<?php

declare(strict_types=1);

namespace BradWaterhouse\DayOne;

use Exception;

class DayOne
{
    public function partOne(): int
    {
        $lines = \array_map('intval', \explode("\n", \file_get_contents('/Users/bradwaterhouse/code/AOC - 2020/src/BradWaterhouse/DayOne/input.txt')));

        foreach ($lines as $line) {
            $remaining = \abs((int) $line - 2020);

            if (\in_array($remaining, $lines)) {
                return $line * $remaining;
            }
        }

        throw new Exception('No numbers add up to 2020');
    }
}
