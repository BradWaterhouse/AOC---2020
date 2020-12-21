<?php

declare(strict_types=1);

namespace Tests\BradWaterhouse;

use BradWaterhouse\DayTwo\DayTwo;
use PHPUnit\Framework\TestCase;

final class DayTwoTest extends TestCase
{
    public function testItReturnsNumberOfRowsWithValidPassword(): void
    {
        $this->assertSame(660, (new DayTwo())->partOne());
    }
}
