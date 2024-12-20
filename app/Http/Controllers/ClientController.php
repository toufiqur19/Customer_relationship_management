<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ClientStoreData;
use App\Http\Requests\ClientUpdateData;
use Illuminate\Support\Facades\Notification;
use Illuminate\Routing\Controllers\Middleware;
use App\Notifications\ClientCreatedNotification;
use Illuminate\Routing\Controllers\HasMiddleware;

class ClientController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view_clients', only: ['index']),
            new Middleware('permission:create_clients', only: ['create', 'store']),
            new Middleware('permission:edit_clients', only: ['edit']),
            new Middleware('permission:delete_clients', only: ['destroy']),
        ];
    }
    
    public function index()
    {
        $clients = Client::get();

        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientStoreData $request)
    {
        $clients = Client::create($request->validated());
        $users = User::all();

        Notification::send($users, new ClientCreatedNotification($clients));

        return redirect()->route('clients.index')->with('success', 'Client created successfully');
    }

   
    public function edit(string $id)
    {
        $clients = Client::find($id);

        return view('clients.edit', compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientUpdateData $request, string $id)
    {
        $clients = Client::find($id);
        $clients->update($request->validated());

        return redirect()->route('clients.index')->with('success', 'Client updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
       $tasks = Task::pluck('client_id');
       $project = Project::pluck('client_id');
       if($tasks->contains($client->id) || $project->contains($client->id)){
        return redirect()->route('clients.index')->with('error', 'Client cannot be deleted because it has tasks or projects');
       }
       else{
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully');
       }
    }
}
