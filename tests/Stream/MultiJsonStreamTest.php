<?php

declare(strict_types=1);

namespace Docker\Tests\Stream;

use Docker\Stream\MultiJsonStream;
use Docker\Tests\TestCase;
use Nyholm\Psr7\Stream;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @internal
 */
class MultiJsonStreamTest extends TestCase
{
    public static function jsonStreamDataProvider(): iterable
    {
        return [
            [
                '{}{"abc":"def"}',
                ['{}', '{"abc":"def"}'],
            ],
            [
                '{"test": "abc\"\""}',
                ['{"test":"abc\"\""}'],
            ],
            [
                '{"test": "abc\"{{-}"}',
                ['{"test":"abc\"{{-}"}'],
            ],
        ];
    }

    /**
     * @dataProvider jsonStreamDataProvider
     */
    public function testReadJsonEscapedDoubleQuote(string $jsonStream, array $jsonParts): void
    {
        $stream = Stream::create($jsonStream);
        $stream->rewind();

        $serializer = $this->getMockBuilder(SerializerInterface::class)
            ->getMock();

        $serializer
            ->expects(self::exactly(\count($jsonParts)))
            ->method('deserialize')
                ->willReturnCallback(function ($part) use ($jsonParts): void {
                    static $counter = 0;
                    self::assertSame($part, $jsonParts[$counter++]);
                })
        ;

        $stub = $this->getMockForAbstractClass(MultiJsonStream::class, [$stream, $serializer]);
        $stub->expects(self::any())
            ->method('getDecodeClass')
            ->willReturn('BuildInfo');

        $stub->wait();
    }
}
