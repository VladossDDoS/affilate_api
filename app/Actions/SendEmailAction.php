<?php

namespace App\Actions;

use App\Mail\NewClientEmail;
use App\Models\Client;
use Illuminate\Support\Facades\Mail;

class SendEmailAction
{
    protected $email;

    public function execute(Client $client, string $type)
    {
        match($type){
            'greet' => $this->email = new NewClientEmail($client),
            default => $this->email = null,
        };

        if (!$this->email) {
            return false;
        }

        Mail::to($client->email)->send($this->email);

        return true;
    }
}
