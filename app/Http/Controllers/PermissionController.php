<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();
        return view("permissions.index", compact("permissions"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("permissions.create");
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
            Permission::create(['name' => $request->name]);
            return redirect('/permissions')->with('success', 'Permission created successfully');
        }else{
            return redirect('/permissions/create')->withInput()->withErrors($validator);
        }
    }

    
    public function edit(string $id)
    {
        $permissions = Permission::find($id);
        return view("permissions.edit", compact("permissions"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions|min:3',
        ]);

        $permission = Permission::find($id);
        if($validator->passes()){
            $permission->name = $request->name;
            $permission->save();
            return redirect('/permissions')->with('success', 'Permission updated successfully');
        }else{
            return redirect('/permissions/'.$id.'/edit')->withInput()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        return redirect('/permissions')->with('success', 'Permission deleted successfully');
    }
}
