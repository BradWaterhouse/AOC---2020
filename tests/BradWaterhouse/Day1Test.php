<?php

declare(strict_types=1);

namespace Tests\BradWaterhouse;

use BradWaterhouse\Day1\Day1;
use PHPUnit\Framework\TestCase;

final class Day1Test extends TestCase
{
    public function testItReturnsTwoNumbersWithSumOf2020(): void
    {
        $this->assertSame(910539, (new Day1())->partOne());
    }

    public function testItReturnsThreeNumbersWithSumOf2020(): void
    {
        $this->assertSame(116724144, (new Day1())->partTwo());
    }
}
