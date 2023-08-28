<?php

use App\Models\User;

use function Pest\Laravel\{actingAs, get, post};

it('should be able to create a new client', function () {
    $user = User::factory()->create();

    actingAs($user);

    post(route('client.store', [
        'name'    => 'Gabriel',
        'phone'   => '9999999999',
        'address' => '123 Fake Street',
    ]))->assertRedirect(route('client.index'));

});

it('should not be able to create a new client without validation of required fields', function () {
    $user = User::factory()->create();

    actingAs($user);

    $response = post(route('client.store', [
        'name'    => '',
        'phone'   => '',
        'address' => '',
    ]));

    $response->assertSessionHasErrors([
        'name'    => 'The name field is required.',
        'phone'   => 'The phone field is required.',
        'address' => 'The address field is required.',
    ]);

});

it('should be able see form of new client', function () {
    $user = User::factory()->create();

    actingAs($user);

    get(route('client.create'))->assertOk();
});
