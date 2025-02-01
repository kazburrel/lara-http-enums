# LaraHttpEnums

**A Laravel package for managing HTTP status codes, methods, and other related HTTP enums.**

## Description

LaraHttpEnums is a simple, easy-to-use package that provides a collection of HTTP status codes, methods, and related enums to be used in your Laravel projects. This package helps streamline working with HTTP-related constants, improving readability and consistency in your code.

## Installation

You can install the package via Composer:

```bash
composer require egbosionu/lara-http-enums
```

HTTP Status Codes

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

HTTP Methods

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

Reason Phrases
use Egbosionu\LaraHttpEnums\ReasonPhrase;
use Egbosionu\LaraHttpEnums\StatusCode;

// Get reason phrase from status code
$phrase = ReasonPhrase::fromStatusCode(StatusCode::NOT_FOUND); // ReasonPhrase::NOT_FOUND
$text = ReasonPhrase::fromStatusCode(StatusCode::NOT_FOUND)->value; // "Not Found"

// Try to get reason phrase
$phrase = ReasonPhrase::tryFromStatusCode(StatusCode::NOT_FOUND); // ReasonPhrase::NOT_FOUND or null if invalid

Features
Type-safe HTTP status codes with integer values

Type-safe HTTP methods with string values

Standard reason phrases for all status codes

Helper methods for checking status code categories

Helper methods for checking method properties

Case-insensitive method name parsing

Null-safe conversion methods

Full PSR-4 autoloading support

Contributing
Contributions are welcome! Please feel free to submit a Pull Request. For major changes, please open an issue first to discuss what you would like to change.

Fork the repository

Create your feature branch (git checkout -b feature/AmazingFeature)

Commit your changes (git commit -m 'Add some AmazingFeature')

Push to the branch (git push origin feature/AmazingFeature)

Open a Pull Request

License
This package is licensed under the MIT License - see the LICENSE file for details.
