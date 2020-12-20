<?php

declare(strict_types=1);

namespace Tests\BradWaterhouse;

use BradWaterhouse\DayOne\DayOne;
use PHPUnit\Framework\TestCase;

final class DayOneTest extends TestCase
{
    public function testItReturnsTwoNumbersWithSumOf2020(): void
    {
        $this->assertSame(910539, (new DayOne())->partOne());
    }

    public function testItReturnsThreeNumbersWithSumOf2020(): void
    {
        $this->assertSame(116724144, (new DayOne())->partTwo());
    }
}
