<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Contracts\View\View;
use Illuminate\Http\{RedirectResponse, Request};

class ClientController extends Controller
{
    public function index(): View
    {
        return view('client.index');
    }

    public function store(): RedirectResponse
    {
        Client::query()->create(request()->all());

        return to_route('client.index');
    }
}
