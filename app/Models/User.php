<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'username',
        'password',
        'role_id'
    ];

    protected $hidden = [
        'password'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function assignedClients()
    {
        $clients = $this->clients();

        if (!$this->isAdmin()) {
            $clients = $clients->where('user_id', $this->id);
        }

        return $clients;
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }

    public function assignedDeposits()
    {
        $deposits = $this->deposits()();

        if (!$this->isAdmin()) {
            $deposits = $deposits->where('user_id', $this->id);
        }

        return $deposits;
    }
}
