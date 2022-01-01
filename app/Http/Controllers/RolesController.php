<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        return view('roles/index', [
            'roles' => Role::all()
        ]);
    }
}
