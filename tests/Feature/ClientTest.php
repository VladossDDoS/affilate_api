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

    public function testClientsCanBeRetrieved()
    {
        $response = $this->get('/api/clients');
        $response->assertOk();
    }

    public function testClientCanBeCreated()
    {
        $response = $this->post('/api/clients', ['name' => 'test1', 'surname' => 'test1', 'phone' => 'test1', 'email' => 'test1@test.test']);
        $response->assertCreated();
    }

    public function testClientCantBeCreatedWithoutData()
    {
        $response = $this->post('/api/clients', []);
        $response->assertStatus(400);
    }

    public function testClientCanBeShown()
    {
        $this->refreshDatabase();
        $this->postJson('/api/clients', ['name' => 'test2', 'surname' => 'test2', 'phone' => 'test2', 'email' => 'test2@test.test']);

        $response = $this->get('/api/clients/2');
        $response->assertOk();
    }

    public function testClientCantBeShownWithWrongIDDataType()
    {
        $response = $this->get('/api/clients/d');
        $response->assertStatus(500);
    }

    public function testClientCantBeShownIfDoesNotExist()
    {
        $response = $this->get('/api/clients/999');
        $response->assertNotFound();
    }

    public function testClientCanBeUpdated()
    {
        $this->refreshDatabase();
        $this->postJson('/api/clients', ['name' => 'test3', 'surname' => 'test3', 'phone' => 'test3', 'email' => 'test3@test.test']);

        $response = $this->putJson('/api/clients/3', ['name' => 'tolik']);
        $response->assertNoContent();
        $response = $this->get('/api/clients/3');
        $response->assertJsonFragment(['name' => 'tolik', 'surname' => 'test3']);
    }

    public function testClientDoesNotUpdateWithoutData()
    {
        $this->postJson('/api/clients', ['name' => 'test4', 'surname' => 'test4', 'phone' => 'test4', 'email' => 'test4@test.test']);

        $response = $this->putJson('/api/clients/4', []);
        $response->assertNoContent();
        $response = $this->get('/api/clients/4');
        $response->assertJsonFragment(['name' => 'test4', 'surname' => 'test4']);
    }

    public function testClientCanBeDeleted()
    {
        $this->refreshDatabase();
        $this->postJson('/api/clients', ['name' => 'test5', 'surname' => 'test5', 'phone' => 'test5', 'email' => 'test5@test.test']);

        $response = $this->delete('/api/clients/5');
        $response->assertNoContent();
        $this->assertSoftDeleted(Client::class, ['id' => '5']);

        $response = $this->delete('/api/clients/6');
        $response->assertNotFound();
    }
}
