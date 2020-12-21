<?php

declare(strict_types=1);

namespace Tests\BradWaterhouse;

use BradWaterhouse\DayTwo\DayTwo;
use PHPUnit\Framework\TestCase;

final class DayTwoTest extends TestCase
{
    public function testItReturnsNumberOfRowsWithValidNumberOfLettersInPassword(): void
    {
        $this->assertSame(660, (new DayTwo())->partOne());
    }

    public function testItReturnsNumberOfRowsWithOneValidLetterIndex(): void
    {
        $this->assertSame(530, (new DayTwo())->partTwo());
    }
}
