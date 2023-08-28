<?php

use App\Models\{Client, User};

use function Pest\Laravel\{actingAs, assertDatabaseCount, delete};

it('should be able destroy a client', function () {
    $user   = User::factory()->create();
    $client = Client::factory()->create();

    actingAs($user);

    delete(route('client.destroy', $client))->assertRedirect(route('client.index'));

    assertDatabaseCount('clients', 0);
});
