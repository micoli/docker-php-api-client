<?php

declare(strict_types=1);

namespace Docker\API\Exception;

use RuntimeException;

class InternalServerErrorException extends RuntimeException implements ServerException
{
    public function __construct(string $message)
    {
        parent::__construct($message, 500);
    }
}
