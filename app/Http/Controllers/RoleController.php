<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
