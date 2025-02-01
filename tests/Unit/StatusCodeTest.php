<?php

use Egbosionu\LaraHttpEnums\StatusCode;
use Egbosionu\LaraHttpEnums\Exceptions\InvalidStatusCodeException;

// Test fromName method
test('can create status code from valid name', function () {
    expect(StatusCode::fromName('OK'))->toBe(StatusCode::OK)
        ->and(StatusCode::fromName('NOT_FOUND'))->toBe(StatusCode::NOT_FOUND);
});

test('throws exception for null name', function () {
    StatusCode::fromName(null);
})->throws(InvalidStatusCodeException::class, 'Status code name cannot be null');

test('throws exception for invalid name', function () {
    StatusCode::fromName('INVALID_CODE');
})->throws(InvalidStatusCodeException::class, 'Invalid status code name: "INVALID_CODE"');

// Test fromInt method
test('can create status code from valid integer', function () {
    expect(StatusCode::fromInt(200))->toBe(StatusCode::OK)
        ->and(StatusCode::fromInt(404))->toBe(StatusCode::NOT_FOUND);
});

test('throws exception for invalid integer', function () {
    StatusCode::fromInt(999);
})->throws(InvalidStatusCodeException::class, 'Invalid HTTP status code: 999');

// Test tryFromName method
test('returns null for invalid name using tryFromName', function () {
    expect(StatusCode::tryFromName('INVALID_CODE'))->toBeNull()
        ->and(StatusCode::tryFromName(null))->toBeNull();
});

test('returns valid status code using tryFromName', function () {
    expect(StatusCode::tryFromName('OK'))->toBe(StatusCode::OK);
});

// Test tryFromInt method
test('returns null for invalid integer using tryFromInt', function () {
    expect(StatusCode::tryFromInt(999))->toBeNull()
        ->and(StatusCode::tryFromInt(null))->toBeNull();
});

test('returns valid status code using tryFromInt', function () {
    expect(StatusCode::tryFromInt(200))->toBe(StatusCode::OK);
});

// Test status code categories
test('can identify informational status codes', function () {
    expect(StatusCode::CONTINUE->isInformational())->toBeTrue()
        ->and(StatusCode::OK->isInformational())->toBeFalse();
});

test('can identify successful status codes', function () {
    expect(StatusCode::OK->isSuccessful())->toBeTrue()
        ->and(StatusCode::NOT_FOUND->isSuccessful())->toBeFalse();
});

test('can identify redirection status codes', function () {
    expect(StatusCode::MOVED_PERMANENTLY->isRedirection())->toBeTrue()
        ->and(StatusCode::OK->isRedirection())->toBeFalse();
});

test('can identify client error status codes', function () {
    expect(StatusCode::NOT_FOUND->isClientError())->toBeTrue()
        ->and(StatusCode::OK->isClientError())->toBeFalse();
});

test('can identify server error status codes', function () {
    expect(StatusCode::INTERNAL_SERVER_ERROR->isServerError())->toBeTrue()
        ->and(StatusCode::NOT_FOUND->isServerError())->toBeFalse();
});

test('can identify any error status codes', function () {
    expect(StatusCode::NOT_FOUND->isError())->toBeTrue()
        ->and(StatusCode::INTERNAL_SERVER_ERROR->isError())->toBeTrue()
        ->and(StatusCode::OK->isError())->toBeFalse();
});

// Test reason phrase
test('can get reason phrase for status code', function () {
    expect(StatusCode::OK->getReasonPhrase())->toBe('OK')
        ->and(StatusCode::NOT_FOUND->getReasonPhrase())->toBe('Not Found');
});

// Test datasets
dataset('valid_status_codes', [
    [200, StatusCode::OK],
    [404, StatusCode::NOT_FOUND],
    [500, StatusCode::INTERNAL_SERVER_ERROR],
]);

test('can create status code from valid integers', function (int $code, StatusCode $expected) {
    expect(StatusCode::fromInt($code))->toBe($expected);
})->with('valid_status_codes');
