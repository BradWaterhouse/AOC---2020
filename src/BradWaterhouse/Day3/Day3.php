<?php

declare(strict_types=1);

namespace BradWaterhouse\Day3;

class Day3
{
    private int $total;
    private int $x;

    public function __construct()
    {
        $this->total = 0;
        $this->x = 0;
    }

    public function partOne(): int
    {
        $chunks = $this->formatChucks($this->getFile());
        array_pop($chunks);

        foreach ($chunks as $key => $chuck) {
            $this->isTree(str_split($chuck)[$this->x]);
            $this->x += 3;
        }

        return $this->total;
    }

    private function isTree(string $input): void
    {
        if ($input === '#') {
            $this->total++;
        }
    }

    private function formatChucks(array $chunks): array
    {
        $formatted = [];

        foreach ($chunks as $chunk) {
            $formatted[] = $this->duplicateChunk($chunk);
        }

        return $formatted;
    }

    private function duplicateChunk(string $chunk): string
    {
        return \str_repeat($chunk, 900);
    }

    private function getFile(): array
    {
        return \explode("\n", \file_get_contents(__DIR__ . '/input.txt'));
    }
}
