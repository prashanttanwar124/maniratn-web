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

test('marketing layout serves brand fonts locally', function () {
    expect(public_path('fonts/instrument-sans-400.woff2'))->toBeFile();
    expect(public_path('fonts/instrument-sans-700.woff2'))->toBeFile();
    expect(public_path('fonts/dm-sans-400.woff2'))->toBeFile();
    expect(public_path('fonts/cormorant-garamond-400.woff2'))->toBeFile();

    $this->get(route('home'))
        ->assertSuccessful()
        ->assertSee('/fonts/instrument-sans-700.woff2', false)
        ->assertSee('/fonts/dm-sans-500.woff2', false)
        ->assertSee('/fonts/cormorant-garamond-400-italic.woff2', false)
        ->assertDontSee('fonts.googleapis.com', false)
        ->assertDontSee('fonts.gstatic.com', false)
        ->assertDontSee('fonts.bunny.net', false);
});
