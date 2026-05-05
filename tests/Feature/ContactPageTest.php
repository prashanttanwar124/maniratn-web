<?php

use Inertia\Testing\AssertableInertia as Assert;

test('guests can visit the contact page', function () {
    $this->get(route('contact'))
        ->assertSuccessful()
        ->assertInertia(fn (Assert $page) => $page
            ->component('Contact')
        );
});
