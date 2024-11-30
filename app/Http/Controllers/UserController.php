<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserData;
use App\Http\Requests\UpdateUserData;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class UserController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view_users', only: ['index']),
            new Middleware('permission:create_users', only: ['create', 'store']),
            new Middleware('permission:edit_users', only: ['edit']),
            new Middleware('permission:delete_users', only: ['destroy']),
        ];
    }

    public function index()
    {
        $users = User::get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserData $request)
    {
        User::create($request->validated());
        return redirect()->route('users.index')->with('success', 'User created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::orderBy('name','ASC')->get();
        $hasRoles = $user->roles->pluck('id');
        return view('users.edit',compact('user','roles','hasRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserData $request, User $user)
    {
        $user->update($request->validated());
        $user->syncRoles($request->role);
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try{
            $user->delete();
            return redirect()->route('users.index')->with('success', 'User deleted successfully');
        }catch(\Exception $e){
            return redirect()->route('users.index')->with('error', 'User cannot be deleted because it has clients');
        }
        
    }
}
