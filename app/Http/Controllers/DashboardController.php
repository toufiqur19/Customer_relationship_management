<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $users = User::count();
        $clients = Client::count();
        $projects = Project::count();
        $tasks = Task::count();
        $activeProjects = Project::where('status', ['in_progress', 'open'])->count();
        $projectDeadline = Project::select('deadline_at','title')->orderBy('deadline_at','asc')->get();

        // single user number of project
        $singleUsers = $projectStatus = Project::select('user_id', DB::raw('count(*) as total'))->groupBy('user_id')->get();

        // project status
        $projectStatus = Project::select('status', DB::raw('count(*) as total'))->groupBy('status')->get();
        $status = $projectStatus->pluck('status');
        $countStatus = $projectStatus->pluck('total');

        // revinue
        $revinue = Project::select('project_cost')->where('status', 'completed')->sum('project_cost');

        // return [$revinue, $revinuecom];

        return view('dashboard', compact('users', 'clients', 'projects', 'tasks', 'countStatus', 'status', 'singleUsers', 'revinue', 'activeProjects', 'projectDeadline'));
    }
}
