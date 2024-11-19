<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\ClientStoreData;
use App\Http\Requests\ClientUpdateData;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        Client::create($request->validated());

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
