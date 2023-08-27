<?php

use App\Models\User;

use function Pest\Laravel\{actingAs, post};

it('should be able to create a new client', function () {
    $user = User::factory()->create();

    actingAs($user);

    post(route('client.store', [
        'name'    => 'Gabriel',
        'phone'   => '9999999999',
        'address' => '123 Fake Street',
    ]))->assertRedirect(route('client.index'));

});
