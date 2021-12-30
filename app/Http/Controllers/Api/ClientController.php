<?php

namespace App\Http\Controllers\Api;

use App\Actions\SendEmailAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Models\Client;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{
    public function store(StoreClientRequest $request, SendEmailAction $action): JsonResponse
    {
        $client = Client::create($request->validated());

        return response()->json([
            'client' => $client
        ], 201);
    }
}
