<?php

namespace App\Http\Controllers;

use App\Models\Client;
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
        $clients = Client::paginate(5);

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

        return redirect()->route('clients.index');
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

        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $clients = Client::find($id);
        $clients->delete();

        return redirect()->route('clients.index');
    }
}
