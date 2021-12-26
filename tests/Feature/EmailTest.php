<?php

namespace Tests\Feature;

use App\Actions\SendEmailAction;
use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmailTest extends TestCase
{
    use RefreshDatabase;

    public function testSendEmail()
    {
        $client = Client::factory()->create();
        $result_true = (new SendEmailAction())->execute($client, 'greet');
        $this->assertTrue($result_true);

        $result_false = (new SendEmailAction())->execute($client, 'test');
        $this->assertFalse($result_false);
    }
}
