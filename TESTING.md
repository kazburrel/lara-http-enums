 # Testing

This document provides information about testing the LaraHttpEnums package.

## Requirements

- PHP 8.2 or higher
- PHPUnit 10.0 or higher
- Composer

## Running Tests

You can run the test suite using Composer:

```bash
composer test
```

Or directly with PHPUnit:

```bash
./vendor/bin/phpunit
```

## Test Structure

The tests are organized into the following categories:

### Unit Tests

- `tests/Unit/StatusCodeTest.php` - Tests for HTTP status code enum
- `tests/Unit/MethodTest.php` - Tests for HTTP method enum
- `tests/Unit/ReasonPhraseTest.php` - Tests for reason phrase enum

### Feature Tests

- `tests/Feature/StatusCodeUsageTest.php` - Integration tests for status codes
- `tests/Feature/MethodUsageTest.php` - Integration tests for methods

## Writing Tests

When adding new features or fixing bugs, please ensure:

1. All new code is covered by tests
2. Tests follow the existing pattern and naming conventions
3. Tests are isolated and don't have side effects
4. Test methods are clearly named and describe what they're testing

Example test structure:

```php
namespace Egbosionu\LaraHttpEnums\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Egbosionu\LaraHttpEnums\StatusCode;

class StatusCodeTest extends TestCase
{
    public function test_can_get_reason_phrase(): void
    {
        $status = StatusCode::OK;
        $this->assertEquals('OK', $status->getReasonPhrase());
    }
}
```

## Code Coverage

To generate code coverage reports:

```bash
composer test-coverage
```

The coverage report will be generated in the `coverage` directory.

## Static Analysis

We use PHPStan for static analysis:

```bash
composer analyse
```

## Style Checking

To ensure your code follows our coding standards:

```bash
composer cs-check
```

To automatically fix style issues:

```bash
composer cs-fix
```

## Continuous Integration

Our CI pipeline runs:
- Full test suite
- Code coverage analysis
- Static analysis
- Style checks

Make sure all these pass locally before submitting a pull request.

## Troubleshooting

### Common Issues

1. **Memory Limits**
   If you encounter memory limit issues:
   ```bash
   php -d memory_limit=-1 vendor/bin/phpunit
   ```

2. **Xdebug Configuration**
   For better performance, disable Xdebug when not generating coverage:
   ```bash
   XDEBUG_MODE=off composer test
   ```

### Getting Help

If you encounter any issues while testing:
1. Check the [issues page](https://github.com/kazburrel/lara-http-enums/issues)
2. Create a new issue with details about your testing environment and the problem
3. Include relevant error messages and steps to reproduce

## Best Practices

1. **Test Isolation**
   - Each test should run independently
   - Clean up any modifications after tests
   - Don't rely on test execution order

2. **Meaningful Assertions**
   - Test one concept per method
   - Use descriptive test method names
   - Include both positive and negative test cases

3. **Performance**
   - Keep tests focused and efficient
   - Avoid unnecessary database operations
   - Use data providers for multiple test cases

4. **Documentation**
   - Document any special setup required for tests
   - Include examples in docblocks
   - Explain complex test scenarios

## Contributing Tests

When contributing new tests:

1. Follow the existing test structure
2. Ensure proper namespacing
3. Add appropriate docblocks
4. Include both success and failure scenarios
5. Test edge cases
6. Verify backward compatibility

## Security Testing

For security-related tests:

1. Test input validation
2. Verify error handling
3. Check access controls
4. Test against common vulnerabilities

Please report security issues via email rather than public issues.