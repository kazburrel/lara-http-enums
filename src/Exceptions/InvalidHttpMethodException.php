<?php

declare(strict_types=1);

namespace Egbosionu\LaraHttpEnums\Exceptions;

class InvalidHttpMethodException extends \ValueError
{
    public function __construct(string $method)
    {
        parent::__construct("Invalid HTTP method: \"$method\"");
    }
}
