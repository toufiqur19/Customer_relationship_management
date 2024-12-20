<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Requests\Project\ProjectStoreData;
use App\Http\Requests\Project\ProjectUpdateData;
use Illuminate\Routing\Controllers\HasMiddleware;

class ProjectController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view_projects', only: ['index']),
            new Middleware('permission:create_projects', only: ['create', 'store']),
            new Middleware('permission:edit_projects', only: ['edit']),
            new Middleware('permission:delete_projects', only: ['destroy']),
        ];
    }
    public function index()
    {
        $projects = Project::with(['client','user'])->get();

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::select('id', 'first_name', 'last_name')->get();
        $clients = Client::select('id', 'company_name')->get();
        return view('projects.create', compact('users', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectStoreData $request)
    {
        Project::create($request->validated());

        return redirect()->route('projects.index')->with('success', 'Project created successfully');
    }

    
    public function edit(Project $project)
    {
        $users = User::select('id', 'first_name', 'last_name')->get();
        $clients = Client::select('id', 'company_name')->get();
        return view('projects.edit', compact('project', 'users', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectUpdateData $request, Project $project)
    {
        $project->update($request->validated());

        return redirect()->route('projects.index')->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $tasks = Task::pluck('project_id');
        if($tasks->contains($project->id)){
            return redirect()->route('projects.index')->with('error', 'Project cannot be deleted because it has tasks');
        }
        else{
            $project->delete();
            return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
        }
    }
}
