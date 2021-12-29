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
        'role'
    ];

    protected $hidden = [
        'password'
    ];

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }
}
