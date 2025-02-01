<?php

declare(strict_types=1);

namespace Egbosionu\LaraHttpEnums;

use Egbosionu\LaraHttpEnums\Exceptions\InvalidStatusCodeException;
use Egbosionu\LaraHttpEnums\ReasonPhrase;

/**
 * A collection of standard HTTP response codes.
 * These codes tell us what happened when a web request was made.
 * 
 * Source: IANA HTTP Status Code Registry
 * @link https://www.iana.org/assignments/http-status-codes/http-status-codes.xhtml
 */
enum StatusCode: int
{
        // 1xx: "Hold on, still working on it"
    case CONTINUE = 100;
    case SWITCHING_PROTOCOLS = 101;
    case PROCESSING = 102;
    case EARLY_HINTS = 103;

        // 2xx: "Here you go, all done successfully"
    case OK = 200;
    case CREATED = 201;
    case ACCEPTED = 202;
    case NON_AUTHORITATIVE_INFORMATION = 203;
    case NO_CONTENT = 204;
    case RESET_CONTENT = 205;
    case PARTIAL_CONTENT = 206;
    case MULTI_STATUS = 207;
    case ALREADY_REPORTED = 208;
    case IM_USED = 226;

        // 3xx: "Look somewhere else"
    case MULTIPLE_CHOICES = 300;
    case MOVED_PERMANENTLY = 301;
    case FOUND = 302;
    case SEE_OTHER = 303;
    case NOT_MODIFIED = 304;
    case USE_PROXY = 305;
    case TEMPORARY_REDIRECT = 307;
    case PERMANENT_REDIRECT = 308;

        // 4xx: "You did something wrong"
    case BAD_REQUEST = 400;
    case UNAUTHORIZED = 401;
    case PAYMENT_REQUIRED = 402;
    case FORBIDDEN = 403;
    case NOT_FOUND = 404;
    case METHOD_NOT_ALLOWED = 405;
    case NOT_ACCEPTABLE = 406;
    case PROXY_AUTHENTICATION_REQUIRED = 407;
    case REQUEST_TIMEOUT = 408;
    case CONFLICT = 409;
    case GONE = 410;
    case LENGTH_REQUIRED = 411;
    case PRECONDITION_FAILED = 412;
    case CONTENT_TOO_LARGE = 413;
    case URI_TOO_LONG = 414;
    case UNSUPPORTED_MEDIA_TYPE = 415;
    case RANGE_NOT_SATISFIABLE = 416;
    case EXPECTATION_FAILED = 417;
    case UNUSED = 418;
    case MISDIRECTED_REQUEST = 421;
    case UNPROCESSABLE_CONTENT = 422;
    case LOCKED = 423;
    case FAILED_DEPENDENCY = 424;
    case TOO_EARLY = 425;
    case UPGRADE_REQUIRED = 426;
    case PRECONDITION_REQUIRED = 428;
    case TOO_MANY_REQUESTS = 429;
    case REQUEST_HEADER_FIELDS_TOO_LARGE = 431;
    case UNAVAILABLE_FOR_LEGAL_REASONS = 451;

        // 5xx: "We did something wrong"
    case INTERNAL_SERVER_ERROR = 500;
    case NOT_IMPLEMENTED = 501;
    case BAD_GATEWAY = 502;
    case SERVICE_UNAVAILABLE = 503;
    case GATEWAY_TIMEOUT = 504;
    case HTTP_VERSION_NOT_SUPPORTED = 505;
    case VARIANT_ALSO_NEGOTIATES = 506;
    case INSUFFICIENT_STORAGE = 507;
    case LOOP_DETECTED = 508;
    case NOT_EXTENDED = 510;
    case NETWORK_AUTHENTICATION_REQUIRED = 511;

    /**
     * Convert a name into a status code, or throw an error if invalid
     *
     * @param string|null $name The status code name
     * @throws InvalidStatusCodeException If the name is null or invalid
     * @return self
     */
    public static function fromName(?string $name): self
    {
        if ($name === null) {
            throw new InvalidStatusCodeException('Status code name cannot be null');
        }

        // Convert to uppercase for enum case matching
        $uppercaseName = strtoupper($name);

        // Find matching case
        foreach (self::cases() as $case) {
            if ($case->name === $uppercaseName) {
                return $case;
            }
        }

        throw new InvalidStatusCodeException("Invalid status code name: \"$name\"");
    }

    /**
     * Try to convert a name into a status code, return null if invalid
     *
     * @param string|null $name The status code name
     * @return self|null
     */
    public static function tryFromName(?string $name): ?self
    {
        if ($name === null) {
            return null;
        }

        // Convert to uppercase for enum case matching
        $uppercaseName = strtoupper($name);

        foreach (self::cases() as $case) {
            if ($case->name === $uppercaseName) {
                return $case;
            }
        }

        return null;
    }

    /**
     * Convert a number into a status code, or throw an error if invalid
     *
     * @param int $code The HTTP status code
     * @throws InvalidStatusCodeException If the code is invalid
     * @return self
     */
    public static function fromInt(int $code): self
    {
        $status = self::tryFrom($code);

        if ($status === null) {
            throw new InvalidStatusCodeException($code);
        }

        return $status;
    }

    /**
     * Try to convert a number into a status code, return null if invalid
     *
     * @param int|null $code The HTTP status code
     * @return self|null
     */
    public static function tryFromInt(?int $code): ?self
    {
        return $code === null ? null : self::tryFrom($code);
    }

    /**
     * Check if this is an informational response (100-199)
     *
     * @return bool
     */
    public function isInformational(): bool
    {
        return $this->value >= 100 && $this->value < 200;
    }

    /**
     * Check if this is a success response (200-299)
     *
     * @return bool
     */
    public function isSuccessful(): bool
    {
        return $this->value >= 200 && $this->value < 300;
    }

    /**
     * Check if this is a redirect response (300-399)
     *
     * @return bool
     */
    public function isRedirection(): bool
    {
        return $this->value >= 300 && $this->value < 400;
    }

    /**
     * Check if this is a client error response (400-499)
     *
     * @return bool
     */
    public function isClientError(): bool
    {
        return $this->value >= 400 && $this->value < 500;
    }

    /**
     * Check if this is a server error response (500-599)
     *
     * @return bool
     */
    public function isServerError(): bool
    {
        return $this->value >= 500 && $this->value < 600;
    }

    /**
     * Check if this is any kind of error response (400-599)
     *
     * @return bool
     */
    public function isError(): bool
    {
        return $this->value >= 400;
    }

    /**
     * Get the standard text description for this status code
     *
     * @return string
     */
    public function getReasonPhrase(): string
    {
        return ReasonPhrase::fromStatusCode($this)->value;
    }
}
