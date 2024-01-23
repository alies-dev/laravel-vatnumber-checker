<?php

use Burtds\VatChecker\Exceptions\VatNumberNotFound;
use Burtds\VatChecker\Facades\VatChecker;

it('can get a valid VAT number', function () {
    $vatInstance = VatChecker::getRawVatInstance('BE', '0749617582');
    expect(json_decode($vatInstance)->valid)->toBeTrue();
});

it('can get the company name from a valid vat number', function () {
    $name = VatChecker::getCompanyName('BE', '0749617582'); // Test with Vulpo's VAT Number
    expect($name)->toBeString();
});

it('can get the company address from a valid vat number', function () {
    $address = VatChecker::getCompanyAddress('BE', '0749617582'); // Test with Vulpo's VAT Number
    expect($address)->toBeString();
});

it('can get a valid state for a valid vat number', function () {
    $isValid = VatChecker::isVatValid('BE', '0749617582'); // Test with Vulpo's VAT Number
    expect($isValid)->toBeTrue();
});

it('fails with invalid vat number', function () {
    $vatinstance = VatChecker::getRawVatInstance('BE', '617582');
    // expect(json_decode($vatinstance)->valid)->toBeFalse();

})->throws(VatNumberNotFound::class);
