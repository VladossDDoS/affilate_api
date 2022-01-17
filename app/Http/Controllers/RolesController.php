<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        if (auth()->user()->can('viewAny', Role::class)) {
            return view('roles/index', [
                'roles' => Role::all()
            ]);
        }

        return redirect('dashboard')->withErrors([
            'message' => __('errors.no_permission')
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
