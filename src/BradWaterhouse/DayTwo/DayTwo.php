<?php

declare(strict_types=1);

namespace BradWaterhouse\DayTwo;

class DayTwo
{
    public function partOne(): int
    {
        $rows = $this->getFile();
        \array_pop($rows);

        $total = 0;

        foreach ($rows as $row) {
            $values = \explode(' ', $row);

            $requirements = $this->formatRequirements($values[0]);
            $letter = \str_replace(':', '', $values[1]);
            $password = $values[2];

            $letterCount = \substr_count($password, $letter);

            if ($letterCount >= $requirements['min'] && $letterCount <= $requirements['max']) {
                $total++;
            }
        }

        return $total;
    }

    private function formatRequirements(string $requirements): array
    {
        $frequencies = \explode('-', $requirements);

        return [
            'min' => (int) $frequencies[0],
            'max' => (int) $frequencies[1]
        ];
    }

    private function getFile(): array
    {
        return \explode("\n", \file_get_contents(__DIR__ . '/input.txt'));
    }
}
