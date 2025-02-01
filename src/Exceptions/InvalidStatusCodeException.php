<?php

declare(strict_types=1);

namespace Egbosionu\LaraHttpEnums\Exceptions;

class InvalidStatusCodeException extends \ValueError
{
    public function __construct(string|int $message)
    {
        if (is_int($message)) {
            parent::__construct("Invalid HTTP status code: $message");
        } else {
            parent::__construct($message);
        }
    }
}
