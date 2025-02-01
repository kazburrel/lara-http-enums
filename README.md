# LaraHttpEnums

**A Laravel package for managing HTTP status codes, methods and other related HTTP enums.**

## Description

LaraHttpEnums is a simple, easy-to-use package that provides a collection of HTTP status codes, methods, and related enums to be used in your Laravel projects. This package helps streamline working with HTTP-related constants, improving readability and consistency in your code.

## Installation

You can install the package via Composer:

```
composer require egbosionu/lara-http-enums
```

### Usage

### HTTP Status Codes

```php
    use Egbosionu\LaraHttpEnums\StatusCode;

    // Basic usage
    $status = StatusCode::OK; // 200

    $status = StatusCode::NOT_FOUND; // 404

    // Get reason phrase
    $phrase = StatusCode::OK->getReasonPhrase(); // "OK"

    // Check status type
    $status = StatusCode::NOT_FOUND;

    $status->isClientError(); // true

    $status->isError(); // true

    $status->isSuccessful(); // false

    // Convert from integer
    $status = StatusCode::fromInt(404); // StatusCode::NOT_FOUND

    $status = StatusCode::tryFromInt(404); // StatusCode::NOT_FOUND or null if invalid

    // Convert from name
    $status = StatusCode::fromName('NOT_FOUND'); // StatusCode::NOT_FOUND

    $status = StatusCode::tryFromName('NOT_FOUND'); // StatusCode::NOT_FOUND or null if invalid
```

### HTTP Methods

```php
    use Egbosionu\LaraHttpEnums\Method;

    // Basic usage
    $method = Method::GET;

    $method = Method::POST;

    // Check method properties
    $method = Method::GET;

    $method->isSafe(); // true - doesn't modify resources

    $method->isIdempotent(); // true - multiple identical requests have same effect as single request

    // Convert from string
    $method = Method::fromName('GET'); // Method::GET

    $method = Method::tryFromName('GET'); // Method::GET or null if invalid
```

### Reason Phrases

```php
    use Egbosionu\LaraHttpEnums\ReasonPhrase;
    use Egbosionu\LaraHttpEnums\StatusCode;

    // Get reason phrase from status code
    $phrase = ReasonPhrase::fromStatusCode(StatusCode::NOT_FOUND); // ReasonPhrase::NOT_FOUND
    
    $text = ReasonPhrase::fromStatusCode(StatusCode::NOT_FOUND)->value; // "Not Found"

    // Try to get reason phrase
    $phrase = ReasonPhrase::tryFromStatusCode(StatusCode::NOT_FOUND); // ReasonPhrase::NOT_FOUND or null if invalid
```

### Features

1. Type-safe HTTP status codes with integer values

2. Type-safe HTTP methods with string values

3. Standard reason phrases for all status codes

4. Helper methods for checking status code categories

5. Helper methods for checking method properties

6. Case-insensitive method name parsing

7. Null-safe conversion methods

8. Full PSR-4 autoloading support

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

If you discover any security-related issues, please email [oegbosionu@gmail.com](mailto:oegbosionu@gmail.com) instead of using the issue tracker.

## Credits

- [Obiora Egbosionu](https://github.com/kazburrel)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
