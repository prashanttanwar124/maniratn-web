<?php

use Inertia\Testing\AssertableInertia as Assert;

test('marketing pages return successful responses', function (string $routeName, string $component) {
    $response = $this->get(route($routeName));

    $response->assertSuccessful()
        ->assertInertia(fn (Assert $page) => $page->component($component));
})->with([
    ['home', 'Welcome'],
    ['contact', 'Contact'],
    ['collections', 'Collections'],
    ['about', 'About'],
]);
