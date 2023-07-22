<?php

declare(strict_types=1);

namespace Docker\Tests;

use Docker\API\Client;
use Docker\Docker;
use ReflectionObject;

/**
 * @internal
 */
class TestCase extends \PHPUnit\Framework\TestCase
{
    private static ?Client $docker = null;

    public static function getDocker(): Client
    {
        //   \putenv('DOCKER_HOST=unix:///var/run/docker.sock');
        if (self::$docker === null) {
            self::$docker = Docker::create();
        }

        return self::$docker;
    }

    protected function getPrivateProperty(object $object, string $propertyName): mixed
    {
        $reflectedClass = new ReflectionObject($object);
        $property = $reflectedClass->getProperty($propertyName);
        $property->setAccessible(true);

        return $property->getValue($object);
    }
}
