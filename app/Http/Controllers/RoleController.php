<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\Middleware;

class RoleController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view_roles', only: ['index']),
            new Middleware('permission:create_roles', only: ['create', 'store']),
            new Middleware('permission:edit_roles', only: ['edit']),
            new Middleware('permission:delete_roles', only: ['destroy']),
        ];
    }
    public function index()
    {
        $roles = Role::all();
        return view("roles.index", compact("roles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view("roles.create", compact("permissions"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions|min:3',
        ]);

        if($validator->passes()){
            $role = Role::create(['name' => $request->name]);
            if(!empty($request->permission)){
                $role->givePermissionTo($request->permission);
            }
            return redirect('/roles')->with('success', 'Roles created successfully');
        }else{
            return redirect('/roles/create')->withInput()->withErrors($validator);
        }
    }

  
    public function edit(string $id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        $hasPermission = $role->permissions->pluck('name');
        return view("roles.edit", compact("role", "permissions", "hasPermission"));         
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions|min:3',
        ]);

        $role = Role::find($id);
        if($validator->passes()){
            $role->update(['name' => $request->name]);
            if(!empty($request->permission)){
                $role->syncPermissions($request->permission);
            }
            return redirect('/roles')->with('success', 'Roles updated successfully');
        }else{
            return redirect('/roles/'.$id.'/edit')->withInput()->withErrors($validator);
        }
         
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect('/roles')->with('success', 'Roles deleted successfully');
    }
}
