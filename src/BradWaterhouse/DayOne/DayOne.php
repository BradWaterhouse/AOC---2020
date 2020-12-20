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
            $remaining = 2020 - $line;

            if (\in_array($remaining, $lines)) {
                return $line * $remaining;
            }
        }

        throw new Exception('No numbers add up to 2020');
    }

    public function partTwo(): int
    {
        $lines = \array_map('intval', \explode("\n", \file_get_contents('/Users/bradwaterhouse/code/AOC - 2020/src/BradWaterhouse/DayOne/input.txt')));
        array_pop($lines);

        foreach ($lines as $line) {
            foreach ($lines as $testMatch) {
                if ($testMatch != $line) {
                    $couple = $line + $testMatch;
                    $companion = 2020 - $couple;
                    if (in_array($companion, $lines) && $companion != 0) {
                        return $line * $testMatch * $companion;
                    }
                }
            }
        }

        throw new Exception('No numbers add up to 2020');
    }
}
