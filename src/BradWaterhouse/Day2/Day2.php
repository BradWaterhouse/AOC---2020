<?php

declare(strict_types=1);

namespace BradWaterhouse\Day2;

class Day2
{
    public function partOne(): int
    {
        $rows = $this->getFile();
        \array_pop($rows);

        $total = 0;

        foreach ($rows as $row) {
            $requirements = $this->formatPartOne(\explode(' ', $row));
            $letterCount = \substr_count($requirements['password'], $requirements['letter']);

            if ($letterCount >= $requirements['frequency']['min'] && $letterCount <= $requirements['frequency']['max']) {
                $total++;
            }
        }

        return $total;
    }

    public function partTwo(): int
    {
        $rows = $this->getFile();
        \array_pop($rows);

        $total = 0;

        foreach ($rows as $row) {
            $requirements = $this->formatPartTwo(\explode(' ', $row));
            $splitPassword = \str_split($requirements['password']);

            if ($this->passwordIsValid($splitPassword, $requirements)) {
                $total++;
            }
        }

        return $total;
    }

    private function formatPartOne(array $row): array
    {
        $frequencies = \explode('-', $row[0]);

        return [
            'letter' => \str_replace(':', '', $row[1]),
            'password' => $row[2],
            'frequency' => [
                'min' => (int) $frequencies[0],
                'max' => (int) $frequencies[1]
            ]
        ];
    }

    private function formatPartTwo(array $row): array
    {
        $frequencies = \explode('-', $row[0]);

        return [
            'letter' => \str_replace(':', '', $row[1]),
            'password' => $row[2],
            'indexes' => [
                'first' => (int) $frequencies[0] - 1,
                'second' => (int) $frequencies[1] - 1
            ]

        ];
    }

    private function passwordIsValid(array $splitPassword, array $requirements): bool
    {
        if ($this->firstIndexIsValid($splitPassword, $requirements) && !$this->secondIndexIsValid($splitPassword, $requirements)) {
            return true;
        }

        if (!$this->firstIndexIsValid($splitPassword, $requirements) && $this->secondIndexIsValid($splitPassword, $requirements)) {
            return true;
        }

        return false;
    }

    private function firstIndexIsValid(array $splitPassword, array $requirements): bool
    {
        return $splitPassword[$requirements['indexes']['first']] === $requirements['letter'];
    }

    private function secondIndexIsValid(array $splitPassword, array $requirements): bool
    {
        return $splitPassword[$requirements['indexes']['second']] === $requirements['letter'];
    }

    private function getFile(): array
    {
        return \explode("\n", \file_get_contents(__DIR__ . '/input.txt'));
    }
}
