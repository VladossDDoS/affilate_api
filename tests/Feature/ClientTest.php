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

    public function testAllClients()
    {
        $clients = Client::factory()->count(2)->create();

        $response = $this->get('api/clients')
            ->assertJson([
                'clients' => [
                    [
                        'name' => $clients->get(0)->name,
                        'surname' => $clients->get(0)->surname,
                        'phone' => $clients->get(0)->phone,
                        'email' => $clients->get(0)->email,
                        'country' => $clients->get(0)->country
                    ],
                    [
                        'name' => $clients->get(1)->name,
                        'surname' => $clients->get(1)->surname,
                        'phone' => $clients->get(1)->phone,
                        'email' => $clients->get(1)->email,
                        'country' => $clients->get(1)->country
                    ]
                ]
            ]);
    }

    public function testStoreClient()
    {
        $response = $this->postJson('api/clients', [
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

    public function testShowClient()
    {
        $client = Client::factory()->create();

        $response = $this->get('api/clients/' . $client->id)
            ->assertJson([
                'client' => [
                    'name' => $client->name,
                    'surname' => $client->surname,
                    'phone' => $client->phone,
                    'email' => $client->email,
                    'country' => $client->country
                ]
            ]);
    }

    public function testUpdateClient()
    {
        $client = Client::factory()->create();

        // update client
        $this->putJson('api/clients/' . $client->id, [
            'name' => 'Vlad',
            'surname' => 'Red',
            'country' => 'Ukraine'
        ])->assertStatus(204);

        // check updated
        $response = $this->get('api/clients/' . $client->id)
            ->assertJson([
                'client' => [
                    'name' => 'Vlad',
                    'surname' => 'Red',
                    'phone' => $client->phone,
                    'email' => $client->email,
                    'country' => 'Ukraine'
                ]
            ]);
    }

    public function testDestroyClient()
    {
        $client = Client::factory()->create();

        $this->delete('api/clients/' . $client->id)
            ->assertStatus(204);
        $this->assertSoftDeleted(Client::class, [
            'id' => $client->id
        ]);

        $this->delete('api/clients/' . ($client->id + 1))
            ->assertStatus(404);
    }
}
