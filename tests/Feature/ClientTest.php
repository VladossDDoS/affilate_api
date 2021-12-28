<?php

namespace Tests\Feature;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class ClientTest extends TestCase
{
    use RefreshDatabase;

    public function testStoreClient()
    {
        $this->postJson('api/clients', [
            'name' => 'Name',
            'surname' => 'Surname',
            'phone' => '+380999999999',
            'email' => 'email@email.com',
            'country' => 'Country'
        ])->assertJson([
            'client' => [
                'name' => 'Name',
                'surname' => 'Surname',
                'phone' => '+380999999999',
                'email' => 'email@email.com',
                'country' => 'Country'
            ]
        ])->assertStatus(201);
    }
}
