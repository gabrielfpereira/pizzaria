<?php

use App\Models\{Client, User};

use function Pest\Laravel\{actingAs, get, put};

it('should be able edit a client', function () {
    $user   = User::factory()->create();
    $client = Client::factory()->create();

    actingAs($user);

    put(route('client.update', $client), [
        'name'    => 'New Name',
        'phone'   => '11-11111-1111',
        'address' => 'New Address',
    ])->assertRedirect(route('client.index'));

    $client->refresh();

    expect($client->name)->toBe('New Name');
    expect($client->phone)->toBe('11-11111-1111');
    expect($client->address)->toBe('New Address');
});

it('should be able see a page to edit a client', function () {
    $user   = User::factory()->create();
    $client = Client::factory()->create();

    actingAs($user);

    get(route('client.edit', $client))->assertOk();
});
