<?php

declare(strict_types=1);

namespace Tests\BradWaterhouse;

use BradWaterhouse\Day3\Day3;
use PHPUnit\Framework\TestCase;

final class Day3Test extends TestCase
{
    public function testItReturnsNumberOfTreesHitOnWayDown(): void
    {
        $this->assertSame(242, (new Day3())->partOne());
    }

    public function testItReturnsNumberOfTreesHitOnWayDownForVariousRoutes(): void
    {
        $this->assertSame(737800248, (new Day3())->partTwo());
    }
}
