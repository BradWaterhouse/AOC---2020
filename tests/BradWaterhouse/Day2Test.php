<?php

declare(strict_types=1);

namespace Tests\BradWaterhouse;

use BradWaterhouse\Day2\Day2;
use PHPUnit\Framework\TestCase;

final class Day2Test extends TestCase
{
    public function testItReturnsNumberOfRowsWithValidNumberOfLettersInPassword(): void
    {
        $this->assertSame(660, (new Day2())->partOne());
    }

    public function testItReturnsNumberOfRowsWithOneValidLetterIndex(): void
    {
        $this->assertSame(530, (new Day2())->partTwo());
    }
}
