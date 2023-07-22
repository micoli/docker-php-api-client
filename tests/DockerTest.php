<?php

declare(strict_types=1);

namespace Docker\Tests;

use Docker\Docker;

/**
 * @internal
 */
class DockerTest extends TestCase
{
    public function testCreate(): void
    {
        self::assertInstanceOf(Docker::class, Docker::create());
    }
}
