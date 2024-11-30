<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use App\Http\Requests\Task\TaskStoreData;
use App\Http\Requests\Task\TaskUpdateData;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class TaskController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view_tasks', only: ['index']),
            new Middleware('permission:create_tasks', only: ['create', 'store']),
            new Middleware('permission:edit_tasks', only: ['edit']),
            new Middleware('permission:delete_tasks', only: ['destroy']),
        ];
    }
    
    public function index()
    {
        $tasks = Task::with(['user','project', 'client'])->get();
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
        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
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
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        try{
            $task->delete();
            return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
        }catch(\Exception $e){
            return redirect()->route('tasks.index')->with('error', 'Task cannot be deleted');
        }
    }
}
