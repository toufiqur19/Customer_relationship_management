<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use App\Http\Requests\Task\TaskStoreData;
use App\Http\Requests\Task\TaskUpdateData;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with('project', 'user', 'client')->paginate(5);
        return view('task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::select('id', 'first_name', 'last_name')->get();
        $clients = Client::select('id', 'company_name')->get();
        $projects = Project::select('id','title')->get();
        return view('task.create', compact('users', 'clients', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStoreData $request)
    {
        Task::create($request->validated());
        return redirect()->route('tasks.index');
    }

  
    public function edit(Task $task)
    {
        $users = User::select('id', 'first_name', 'last_name')->get();
        $clients = Client::select('id', 'company_name')->get();
        $projects = Project::select('id','title')->get();
        return view('task.edit', compact('task','users', 'clients', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskUpdateData $request, Task $task)
    {
        $task->update($request->validated());
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
