<?php

/**
 * Test: Nette\Utils\Validators::assertField()
 */

use Nette\Utils\Validators,
	Tester\Assert;


require __DIR__ . '/../bootstrap.php';


$arr = ['first' => TRUE];

Assert::exception(function() use ($arr) {
	Validators::assertField(NULL, 'foo', 'foo');
}, 'Nette\Utils\AssertionException', "The first argument expects to be array, NULL given.");

Assert::exception(function() use ($arr) {
	Validators::assertField($arr, 'second', 'int');
}, 'Nette\Utils\AssertionException', "Missing item 'second' in array.");

Validators::assertField($arr, 'first');

Assert::exception(function() use ($arr) {
	Validators::assertField($arr, 'first', 'int');
}, 'Nette\Utils\AssertionException', "The item 'first' in array expects to be int, boolean given.");
