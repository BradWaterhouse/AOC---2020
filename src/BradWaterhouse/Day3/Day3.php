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

        $route = [
            ['right' => 3, 'down' => 1],
        ];

        return $this->takeRoutes($route, $chunks);
    }

    public function partTwo(): int
    {
        $routes = [
            ['right' => 1, 'down' => 1],
            ['right' => 3, 'down' => 1],
            ['right' => 5, 'down' => 1],
            ['right' => 7, 'down' => 1],
            ['right' => 1, 'down' => 2]
        ];

        $chunks = $this->formatChucks($this->getFile());

        return $this->takeRoutes($routes, $chunks);
    }

    private function takeRoutes(array $routes, array $chunks): int
    {
        $size = \count($chunks) - 1;

        foreach ($routes as $key => $route) {
            for ($x = 0; $x <= $size; $x += $route['down']) {
                $this->isTree(\str_split($chunks[$x])[$this->x]);

                $this->x += $route['right'];
            }

            $routes['totals'][] = $this->total;
            $this->total = 0;
        }

        return \array_product($routes['totals']);
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
        $file = \explode("\n", \file_get_contents(__DIR__ . '/input.txt'));
        array_pop($file);

        return $file;
    }
}
