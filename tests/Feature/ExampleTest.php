<?php

test('marketing pages return successful responses', function (string $routeName) {
    $response = $this->get(route($routeName));

    $response->assertSuccessful();
})->with([
    'home',
    'contact',
    'collections',
    'about',
]);
