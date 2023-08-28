<?php

namespace App\Http\Controllers;

use App\Http\Requests\{StoreClientRequest, UpdateClientRequest};
use App\Models\Client;
use Illuminate\Contracts\View\View;
use Illuminate\Http\{RedirectResponse, Request};

class ClientController extends Controller
{
    public function index(): View
    {
        $clients = Client::query()->paginate(15);

        return view('client.index', compact('clients'));
    }

    public function create(): View
    {
        return view('client.create');
    }

    public function store(StoreClientRequest $request): RedirectResponse
    {
        Client::query()->create($request->validated());

        return to_route('client.index');
    }

    public function edit(Client $client): View
    {
        return view('client.edit', compact('client'));
    }

    public function update(UpdateClientRequest $request, Client $client): RedirectResponse
    {
        $client->update($request->validated());

        return to_route('client.index');
    }

    public function destroy(Client $client): RedirectResponse
    {
        $client->delete();

        return to_route('client.index');
    }
}
