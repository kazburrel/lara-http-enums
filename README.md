# LaraHttpEnums

**A Laravel package for managing HTTP status codes, methods, and other related HTTP enums.**

## Description

LaraHttpEnums is a simple, easy-to-use package that provides a collection of HTTP status codes, methods, and related enums to be used in your Laravel projects. This package helps streamline working with HTTP-related constants, improving readability and consistency in your code.

## Installation

You can install the package via Composer:

```bash
composer require egbosionu/lara-http-enums
```
Usage
You can access HTTP status codes and methods as enums in your Laravel application. For example:
```bash
use Egbosionu\LaraHttpEnums\HttpStatusCode;

$status = HttpStatusCode::OK; // 200
$method = HttpStatusCode::METHOD_GET; // "GET"
```
Feel free to explore and extend the package with additional enums based on your project requirements.

Contributing
Contributions are welcome! Please fork the repository, create a new branch, and submit a pull request. For major changes, please open an issue first to discuss what you would like to change.

License
This package is licensed under the MIT License - see the LICENSE file for details.
```bash

### Sections Breakdown:
- **Installation**: Explains how to install your package via Composer.
- **Usage**: Provides a basic usage example, showing how the enums work.
- **Contributing**: Encourages others to contribute to your project.
- **License**: Mentions the license under which your package is distributed (MIT in your case).

Once you have this, you can add it to your project’s root directory, name it `README.md`, and commit the changes.

Would you like help with any specific part of the README?
```
