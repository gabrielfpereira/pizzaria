<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Models\Client;
use Illuminate\Contracts\View\View;
use Illuminate\Http\{RedirectResponse, Request};

class ClientController extends Controller
{
    public function index(): View
    {
        return view('client.index');
    }

    public function store(StoreClientRequest $request): RedirectResponse
    {
        Client::query()->create($request->validated());

        return to_route('client.index');
    }
}
