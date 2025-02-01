<?php

declare(strict_types=1);

namespace Egbosionu\LaraHttpEnums;

use ValueError;

/**
 * String values for HTTP Methods as defined in IETF RFC 5789 and RFC 7231.
 */
enum Method: string
{
    case GET = 'GET';
    case HEAD = 'HEAD';
    case POST = 'POST';
    case PUT = 'PUT';
    case DELETE = 'DELETE';
    case CONNECT = 'CONNECT';
    case OPTIONS = 'OPTIONS';
    case TRACE = 'TRACE';
    case PATCH = 'PATCH';

    /**
     * Get a Method enum from the given name (case-insensitive).
     *
     * @param string $name The method name to convert.
     * @return Method
     * @throws ValueError if the name is not valid.
     */
    public static function fromName(string $name): Method
    {
        $method = self::tryFromName($name);

        if ($method === null) {
            throw new ValueError("Invalid HTTP method: \"$name\"");
        }

        return $method;
    }

    /**
     * Check if the method is safe (does not modify resources).
     *
     * @return bool
     */
    public function isSafe(): bool
    {
        return in_array($this, [
            self::GET,
            self::HEAD,
            self::OPTIONS,
            self::TRACE
        ], true);
    }


    /**
     * Check if the method is idempotent (multiple identical requests have same effect as single request).
     *
     * @return bool
     */
    public function isIdempotent(): bool
    {
        return in_array($this, [
            self::GET,
            self::HEAD,
            self::PUT,
            self::DELETE,
            self::OPTIONS,
            self::TRACE
        ], true);
    }

    /**
     * Try to get a Method enum from the given name (case-insensitive).
     *
     * @param string|null $name The method name to convert.
     * @return Method|null
     */
    public static function tryFromName(?string $name): ?Method
    {
        if ($name === null) {
            return null;
        }

        // Try to get the corresponding constant by name
        return self::tryFrom(strtoupper($name));
    }
}
