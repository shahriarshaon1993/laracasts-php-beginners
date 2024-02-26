<?php

use Core\Validator;

it('validates a string', function () {
    expect(Validator::string('foobar'))->toBeTrue()
        ->and(Validator::string(false))->toBeFalse()
        ->and(Validator::string(''))->toBeFalse();
});

it('validates a string with a minimum length', function () {
    expect(Validator::string('foobar', 20))->toBeFalse();
});

it('validates an email', function () {
    expect(Validator::email('foobar'))->toBeFalse()
        ->and(Validator::email('foobar@example.com'))->toBeTrue();
});

it('validates that a number is greater then a given amount', function () {
    expect(Validator::greaterThen(10, 1))->toBeTrue()
        ->and(Validator::greaterThen(10, 100))->toBeFalse();
})->only();