<?php

declare(strict_types=1);

namespace Docker\Stream;

use Psr\Http\Message\StreamInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Represent a stream that decode a stream with multiple json in it.
 */
abstract class MultiJsonStream extends CallbackStream
{
    private SerializerInterface $serializer;

    public function __construct(StreamInterface $stream, SerializerInterface $serializer)
    {
        parent::__construct($stream);

        $this->serializer = $serializer;
    }

    protected function readFrame(): mixed
    {
        $jsonFrameEnd = false;
        $lastJsonChar = '';
        $inquote = false;
        $jsonFrame = '';
        $level = 0;

        // This is a
        while (!$jsonFrameEnd && !$this->stream->eof()) {
            $jsonChar = $this->stream->read(1);

            if ($jsonChar === '"' && $lastJsonChar !== '\\') {
                $inquote = !$inquote;
            }

            // We ignore white space when it is not part of a quoted string.
            if (!$inquote && \in_array($jsonChar, [' ', "\r", "\n", "\t"], true)) {
                continue;
            }

            if (!$inquote && \in_array($jsonChar, ['{', '['], true)) {
                ++$level;
            }

            if (!$inquote && \in_array($jsonChar, ['}', ']'], true)) {
                --$level;

                if ($level === 0) {
                    $jsonFrameEnd = true;
                    $jsonFrame .= $jsonChar;
                    $lastJsonChar = '';
                    continue;
                }
            }

            $jsonFrame .= $jsonChar;
            $lastJsonChar = $jsonChar;
        }

        // Invalid last json, or timeout, or connection close before receiving
        if (!$jsonFrameEnd) {
            return null;
        }

        return $this->serializer->deserialize($jsonFrame, 'Docker\\API\\Model\\' . $this->getDecodeClass(), 'json');
    }

    /**
     * Get the decode class to pass to serializer.
     *
     * @return string
     */
    abstract protected function getDecodeClass();
}
