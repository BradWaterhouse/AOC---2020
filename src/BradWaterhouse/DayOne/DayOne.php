<?php

declare(strict_types=1);

namespace BradWaterhouse\DayOne;

use Exception;

class DayOne
{
    public function partOne(): int
    {
        $lines = $this->getFile();

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
        $lines = $this->getFile();
        \array_pop($lines);

        foreach ($lines as $line) {
            foreach ($lines as $testMatch) {
                if ($testMatch !== $line) {
                    $couple = $line + $testMatch;
                    $companion = 2020 - $couple;
                    if ($companion !== 0 && \in_array($companion, $lines, true)) {
                        return $line * $testMatch * $companion;
                    }
                }
            }
        }

        throw new Exception('No numbers add up to 2020');
    }


    private function getFile(): array
    {
        return \array_map('intval', \explode("\n", \file_get_contents(__DIR__ . '/input.txt')));
    }
}
