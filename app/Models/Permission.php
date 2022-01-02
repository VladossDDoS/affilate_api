<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    const ROLE_CREATE = 'role_create';
    const ROLE_UPDATE = 'role_update';
    const ROLE_VIEW = 'role_view';
    const ROLE_VIEWANY = 'role_viewany';
    const ROLE_DELETE = 'role_delete';
    const ROLE_RESTORE = 'role_restore';
    const ROLE_FORCEDELETE = 'role_force';



    protected $fillable = [
        'name',
        'slug',
        'description'
    ];

    public function rolePermissions()
    {
        return $this->hasMany(RolePermission::class);
    }
}
